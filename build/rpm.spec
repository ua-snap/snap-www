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
# Minifies javascript
make

%install
rm -rf ${RPM_BUILD_ROOT}
echo build root: ${RPM_BUILD_ROOT}

mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/css
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/images
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/js
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/src
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/exporting-server
mkdir -p ${RPM_BUILD_ROOT}/%{inst_dir}/temp
mkdir -p ${RPM_BUILD_ROOT}/var/log/
mkdir -p ${RPM_BUILD_ROOT}/etc/httpd/conf.d

touch ${RPM_BUILD_ROOT}/var/log/%{hostname}-error_log
touch ${RPM_BUILD_ROOT}/var/log/%{hostname}-access_log

cp -a *.php ${RPM_BUILD_ROOT}/%{inst_dir}/
cp -a src/*.php ${RPM_BUILD_ROOT}/%{inst_dir}/src/
cp -a js/* ${RPM_BUILD_ROOT}/%{inst_dir}/js/
cp -a css/*.css ${RPM_BUILD_ROOT}/%{inst_dir}/css/
cp -R images/* ${RPM_BUILD_ROOT}/%{inst_dir}/images/
cp -aR exporting-server ${RPM_BUILD_ROOT}/%{inst_dir}/exporting-server/
cp -a build/snap.conf ${RPM_BUILD_ROOT}/etc/httpd/conf.d/

%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr(644,apache,apache,755)
%{inst_dir}/*.php
%{inst_dir}/css
%{inst_dir}/images
%{inst_dir}/js
%{inst_dir}/src
%{inst_dir}/exporting-server
%attr(644,root,root) /etc/httpd/conf.d/snap.conf
%attr(744,apache,apache) %{inst_dir}/temp
%ghost %attr(644,apache,apache) /var/log/%{hostname}-error_log
%ghost %attr(644,apache,apache) /var/log/%{hostname}-access_log

%post
service httpd restart