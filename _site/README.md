ATWSS
=====

[Atlas Wireless Safety System (website)](http://cern.ch/atwss)

Rebuild the website:

== Using Jekyl
(ruby > 2.0)

yum install ruby
yum install ruby-devel		(ruby-dev on ubuntu)
yum install rubygems
yum install gcc
gem install jekyll

== connecting to Oracle
install oracle instance client including subdirectory 'sdk'
(linux) env LD_LIBRARY_PATH=$LD_LIBRARY_PATH /usr/bin/gem install ruby-oci8
(macos) env DYLD_LIBRARY_PATH=$DYLD_LIBRARY_PATH RC_ARCHS=$RC_ARCHS /usr/bin/gem install ruby-oci8

== configuration
cp config/oracle_example.rb config/oracle.rb
edit user/pwd into file

mount the videos directory in the root dir of the project

== check db test
ruby -rubygems db-test.rb

== build website
jekyll build
(result in _site, _site/cern is protected)

== deploy to CERN
mount smb://cerndataweb.cern.ch/W-ATWSS$ (inside cern)
./deploy.sh (copies _site to W-ATWSS)

== note
- do not touch web.config files in W-ATWSS
- do not uncomment .htaccess in cern, otherwise directory becomes unreadable

Mark Donszelmann
