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
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/css
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/images
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/js
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/exporting-server
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/temp
mkdir -p ${RPM_BUILD_ROOT}/var/log/
mkdir -p ${RPM_BUILD_ROOT}/etc/httpd/conf.d
mkdir -p ${RPM_BUILD_ROOT}/home/jenkins/
mkdir -p ${RPM_BUILD_ROOT}/etc/cron.weekly/
mkdir -p ${RPM_BUILD_ROOT}/usr/lib64/snapwww/src
mkdir -p ${RPM_BUILD_ROOT}/usr/bin/snapwww/src
mkdir -p ${RPM_BUILD_ROOT}/etc/php.d/

touch ${RPM_BUILD_ROOT}/var/log/%{hostname}-error_log
touch ${RPM_BUILD_ROOT}/var/log/%{hostname}-access_log
touch ${RPM_BUILD_ROOT}/var/log/%{hostname}-update_log

cp -a *.php ${RPM_BUILD_ROOT}/%{inst_dir}/
cp -a src/*.php ${RPM_BUILD_ROOT}/usr/lib64/snapwww/src
cp -a js/* ${RPM_BUILD_ROOT}/%{inst_dir}/js/
cp -a css/*.css ${RPM_BUILD_ROOT}/%{inst_dir}/css/
cp -R images/* ${RPM_BUILD_ROOT}/%{inst_dir}/images/
cp -aR exporting-server ${RPM_BUILD_ROOT}/%{inst_dir}/exporting-server/
cp -a build/snap.conf ${RPM_BUILD_ROOT}/etc/httpd/conf.d/
cp -a build/snapweb_database_maintenance.php ${RPM_BUILD_ROOT}/etc/cron.weekly/
cp -a build/snap.ini ${RPM_BUILD_ROOT}/etc/php.d/
cp -a scripts/migrate.php ${RPM_BUILD_ROOT}/usr/bin/snapwww/

%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr(644,apache,apache,755)
%{inst_dir}/*.php
%{inst_dir}/css
%{inst_dir}/images
%{inst_dir}/js
%attr(744,apache,apache) /usr/lib64/snapwww/src/
%config /usr/lib64/snapwww/src/Config.php
%config /etc/php.d/snap.ini
%{inst_dir}/exporting-server
%attr(644,root,root) /etc/httpd/conf.d/snap.conf
%attr(744,apache,apache) %{inst_dir}/temp
%ghost %attr(644,apache,apache) /var/log/%{hostname}-error_log
%ghost %attr(644,apache,apache) /var/log/%{hostname}-access_log
%attr(700,root,root) /etc/cron.weekly/snapweb_database_maintenance.php
%attr(700,root,root) /usr/bin/snapwww/migrate.php

%post
/usr/bin/snapwww/migrate.php up >> /var/log/%{hostname}-update_log 2>&1
service httpd restart
