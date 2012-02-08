Name: snapwww

# Specify dynamic version with: --define "version 1.2.3"
Version:	%{version}
Release:	%{release}
Summary:	SNAP web site

Group:		Web/Applications
License:	BSD
URL:		http://snap.uaf.edu
Source0:	snapwww.tgz
BuildRoot:	%(mktemp -ud %{_tmppath}/%{name}-%{version}-%{release}-XXXXXX)
BuildArch: 	noarch
ExclusiveArch: noarch

BuildRequires:	php, php-devel
Requires:	php
Requires:   mysql, mysql-devel, php-mysql
Requires:	php-pdo
Requires:   httpd
Requires:   php-pecl-json
Requires:   php-pear-Mail
Requires:   ImageMagick

%define inst_dir /var/www/snap
%define hostname snap

%description
This package contains the web site for the Scenarios Network for Alaska and Arctic Planning

%prep
%setup -c

%build
make javascript
make version

%install
rm -rf ${RPM_BUILD_ROOT}
echo build root: ${RPM_BUILD_ROOT}

mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/css/custom-theme/images
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/images
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/js
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/exporting-server/temp
mkdir -p ${RPM_BUILD_ROOT}/var/log/httpd/
mkdir -p ${RPM_BUILD_ROOT}/etc/httpd/conf.d
mkdir -p ${RPM_BUILD_ROOT}/home/jenkins/
mkdir -p ${RPM_BUILD_ROOT}/etc/cron.weekly/
mkdir -p ${RPM_BUILD_ROOT}/usr/lib64/snapwww/src
mkdir -p ${RPM_BUILD_ROOT}/usr/bin/snapwww/src
mkdir -p ${RPM_BUILD_ROOT}/etc/php.d/
mkdir -p ${RPM_BUILD_ROOT}/tmp

touch ${RPM_BUILD_ROOT}/var/log/httpd/%{hostname}-error_log
touch ${RPM_BUILD_ROOT}/var/log/httpd/%{hostname}-access_log
touch ${RPM_BUILD_ROOT}/var/log/httpd/%{hostname}-update_log

cp -a *.php ${RPM_BUILD_ROOT}/%{inst_dir}/
cp -a src/*.php ${RPM_BUILD_ROOT}/usr/lib64/snapwww/src
cp -a js/* ${RPM_BUILD_ROOT}/%{inst_dir}/js/
cp -a css/*.css ${RPM_BUILD_ROOT}/%{inst_dir}/css/
cp -a css/custom-theme/*.css ${RPM_BUILD_ROOT}/%{inst_dir}/css/custom-theme/
cp -a css/custom-theme/images/*.png ${RPM_BUILD_ROOT}/%{inst_dir}/css/custom-theme/images/
cp -R images/* ${RPM_BUILD_ROOT}/%{inst_dir}/images/
cp -a exporting-server/index.php ${RPM_BUILD_ROOT}/%{inst_dir}/exporting-server/
cp -a build/snap.conf ${RPM_BUILD_ROOT}/etc/httpd/conf.d/
cp -a build/snapweb_database_maintenance.php ${RPM_BUILD_ROOT}/etc/cron.weekly/
cp -a build/snap.ini ${RPM_BUILD_ROOT}/etc/php.d/
cp -a scripts/migrate.php ${RPM_BUILD_ROOT}/usr/bin/snapwww/
cp -a build/community_charts_new_ingest.csv ${RPM_BUILD_ROOT}/tmp/

%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr(644,apache,apache,755)
%{inst_dir}/*.php
%{inst_dir}/css
%{inst_dir}/images
%{inst_dir}/js
%attr(744,apache,apache) /usr/lib64/snapwww/src/
%ghost /usr/lib64/snapwww/src/Config.php
%config /etc/php.d/snap.ini
%{inst_dir}/exporting-server/index.php
%attr(644,root,root) /etc/httpd/conf.d/snap.conf
%attr(774,apache,apache) %{inst_dir}/exporting-server/temp
%ghost %attr(644,apache,apache) /var/log/httpd/%{hostname}-error_log
%ghost %attr(644,apache,apache) /var/log/httpd/%{hostname}-access_log
%ghost %attr(644,jenkins,jenkins) /var/log/httpd/%{hostname}-update_log
%attr(700,root,root) /etc/cron.weekly/snapweb_database_maintenance.php
%attr(700,root,root) /usr/bin/snapwww/migrate.php
%attr(700,mysql,mysql) /tmp/community_charts_new_ingest.csv

%post
/usr/bin/snapwww/migrate.php up >> /var/log/httpd/%{hostname}-update_log 2>&1
service httpd graceful