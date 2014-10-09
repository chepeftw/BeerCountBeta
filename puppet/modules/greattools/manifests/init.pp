# == Class: greattools
#
# Installs packages
#
class greattools {
  package { ['curl', 'vim', 'language-pack-en']:
    ensure => present;
  }
}
