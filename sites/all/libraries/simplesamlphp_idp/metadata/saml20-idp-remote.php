<?php
/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote 
 */

/*
 * Guest IdP. allows users to sign up and register. Great for testing!
 */
$metadata['https://openidp.feide.no'] = array(
	'name' => array(
		'en' => 'Feide OpenIdP - guest users',
		'no' => 'Feide Gjestebrukere',
	),
	'description'          => 'Here you can login with your account on Feide RnD OpenID. If you do not already have an account on this identity provider, you can create a new one by following the create new account link and follow the instructions.',

	'SingleSignOnService'  => 'https://openidp.feide.no/simplesaml/saml2/idp/SSOService.php',
	'SingleLogoutService'  => 'https://openidp.feide.no/simplesaml/saml2/idp/SingleLogoutService.php',
	'certFingerprint'      => 'c9ed4dfb07caf13fc21e0fec1572047eb8a7a4cb'
);




$metadata['https://telr-mkt-dev.inadev.net/simplesaml/saml2/idp/metadata.php'] = array (
  'metadata-set' => 'saml20-idp-remote',
  'entityid' => 'https://telr-mkt-dev.inadev.net/simplesaml/saml2/idp/metadata.php',
  'SingleSignOnService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://telr-mkt-dev.inadev.net/simplesaml/saml2/idp/SSOService.php',
    ),
  ),
  'SingleLogoutService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://telr-mkt-dev.inadev.net/simplesaml/saml2/idp/SingleLogoutService.php',
    ),
  ),
  'certData' => 'MIIDyTCCArGgAwIBAgIJANYvvvJW6nqRMA0GCSqGSIb3DQEBCwUAMHsxCzAJBgNVBAYTAkFVMQswCQYDVQQIDAJXQjEMMAoGA1UEBwwDS09MMQwwCgYDVQQKDANPSVQxDDAKBgNVBAsMA1BIUDESMBAGA1UEAwwJU0FSQVNXQVRBMSEwHwYJKoZIhvcNAQkBFhJOSVZFRElUQSBBUEFSVE1FTlQwHhcNMTcwMjExMTEwMzMwWhcNMjcwMjExMTEwMzMwWjB7MQswCQYDVQQGEwJBVTELMAkGA1UECAwCV0IxDDAKBgNVBAcMA0tPTDEMMAoGA1UECgwDT0lUMQwwCgYDVQQLDANQSFAxEjAQBgNVBAMMCVNBUkFTV0FUQTEhMB8GCSqGSIb3DQEJARYSTklWRURJVEEgQVBBUlRNRU5UMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4gF687vm0xMhhn5H5dzz4TVE7GXqu1lhO0vjDVJl8jtHVIdZluE7tYxylaeYYYMY8XCVBc4odX0q9QxhqU8JMEqOmm+BhV6itHqOKEeKKuHfwjcMfoxGs2I0KyHPXN2kmI73wsmZPsG3nv4TnPxSiP/E+K4WSH9M434jMB8uwPoV7f2H3qysECuZSpCxdk+LdGFeb7U23zjwjCW+hYV0X+GCrCo4NbA8SnQo2Wo4jaztahVPwR5lKiNW+PacGvCvcwSxeIU+bR2lvj06BU3KyFLJewGOhrtaMdG5BiiPQf9+rYjAORF79V2H6r5hxbSRgeQ1sxzB7x9lng4aeQNmywIDAQABo1AwTjAdBgNVHQ4EFgQUHI5zlADGwTUoK5Xhi5heXH7L4+UwHwYDVR0jBBgwFoAUHI5zlADGwTUoK5Xhi5heXH7L4+UwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAi23fH5slMzdE2eOrCUDTQ34+9Zv//IFGkvO77pE/2GqzDcJRCUfx5rNUxsYskEpslUMivwwTVbSHg97SV/NsVqDg+t3pDbQn3ZcCzsQ6N2gaiNbkPMu1EW551OmiPf1XKmLvgZS2oX8AW4rmMbvqyOCuVqT42J2vHO4Cr752D48uWbxNnwSkFAK0XjMKb4+s48mAY5Z3m7iMQBj4r9v9VTuU2ien01ykruu+OVvYO2NTliyA7QMr0yOfA3NeyoIhPadNi8MDSlvWeDOBmZqGRUmr5arzLCw7VfCm9tLfYUSMgYGaeTrguLrcHaFDrL2CWKye9W9yjttNZRLsoe0uvA==',
  'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
);