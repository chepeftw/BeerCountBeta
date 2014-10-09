# == Class: greattools
#
# Installs packages
#
class greattools {
  package { ['curl', 'vim']:
    ensure => present;
  }
}
