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
Requires: 	php-pear-Log
Requires:   ImageMagick

%define inst_dir /var/www/snap
%define hostname www.snap.uaf.edu

%description
This package contains the web site for the Scenarios Network for Alaska and Arctic Planning.

%prep
%setup -c

%build
make javascript
make version

%install
rm -rf ${RPM_BUILD_ROOT}

mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/css/custom-theme/images
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/images
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/js
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/charts
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/logos
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/clippy
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

cp -a favicon.ico ${RPM_BUILD_ROOT}/%{inst_dir}/
cp -a *.php ${RPM_BUILD_ROOT}/%{inst_dir}/
cp -a src/*.php ${RPM_BUILD_ROOT}/usr/lib64/snapwww/src
cp -a src/Config.php.example ${RPM_BUILD_ROOT}/usr/lib64/snapwww/src
cp -a js/min.js ${RPM_BUILD_ROOT}/%{inst_dir}/js/
cp -a css/*.css ${RPM_BUILD_ROOT}/%{inst_dir}/css/
cp -R clippy/* ${RPM_BUILD_ROOT}/%{inst_dir}/clippy/
cp -a css/custom-theme/*.css ${RPM_BUILD_ROOT}/%{inst_dir}/css/custom-theme/
cp -a css/custom-theme/images/*.png ${RPM_BUILD_ROOT}/%{inst_dir}/css/custom-theme/images/
cp -R images/* ${RPM_BUILD_ROOT}/%{inst_dir}/images/
cp -R logos/* ${RPM_BUILD_ROOT}/%{inst_dir}/logos/
cp -a build/snap.conf ${RPM_BUILD_ROOT}/etc/httpd/conf.d/
cp -a build/snap.ini ${RPM_BUILD_ROOT}/etc/php.d/
cp -a scripts/migrate.php ${RPM_BUILD_ROOT}/usr/bin/snapwww/

%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr(644,apache,apache,755)
%{inst_dir}/favicon.ico
%{inst_dir}/*.php
%{inst_dir}/css
%{inst_dir}/logos
%{inst_dir}/images
%{inst_dir}/js
%{inst_dir}/clippy
%attr(744,apache,apache) /usr/lib64/snapwww/src/
%config(noreplace) /usr/lib64/snapwww/src/Config.php
%config(noreplace) /usr/lib64/snapwww/src/Config.php.example
%config(noreplace) /etc/php.d/snap.ini
%attr(644,root,root) %config(noreplace) /etc/httpd/conf.d/snap.conf
%attr(774,apache,apache) %{inst_dir}/charts
%ghost %attr(644,apache,apache) /var/log/httpd/%{hostname}-error_log
%ghost %attr(644,apache,apache) /var/log/httpd/%{hostname}-access_log
%ghost %attr(644,jenkins,jenkins) /var/log/httpd/%{hostname}-update_log
%attr(700,root,root) /usr/bin/snapwww/migrate.php

%post
/usr/bin/snapwww/migrate.php up >> /var/log/httpd/%{hostname}-update_log 2>&1
service httpd graceful