Name: SNAP Web		

# Specify dynamic version with: --define "version 1.2.3"
Version:	%{version}
Release:	%{buildnumber}
Summary:	SNAP web site

Group:		Web/Applications
License:	BSD
URL:		http://snap.uaf.edu
Source0:	snapwww.tgz
BuildRoot:	%(mktemp -ud %{_tmppath}/%{name}-%{version}-%{release}-XXXXXX)
BuildArch: noarch

BuildRequires:	php, php-devel
Requires:	php
Requires:   mysql, mysql-devel
Requires:   httpd

%description
This package contains the web site for the Scenarios Network for Alaska and Arctic Planning

%prep
%setup -q

%build
%configure
make %{?_smp_mflags}


%install
rm -rf $RPM_BUILD_ROOT
make install DESTDIR=$RPM_BUILD_ROOT


%clean
rm -rf $RPM_BUILD_ROOT


%files
%defattr(-,root,root,-)
%doc



%changelog

