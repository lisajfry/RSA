<?php
require __DIR__ . '/vendor/autoload.php'; // Pastikan path ini mengarah ke file autoload.php yang benar

use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA;
use phpseclib3\Net\SFTP;

// Membuat kunci publik dan privat
$rsa = PublicKeyLoader::load('-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0FPqri0cb2JZfXJ/DgYSF6vUp
wmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/3j+skZ6UtW+5u09lHNsj6tQ
51s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQABAoGAFijko56+qGyN8M0RVyaRAXz++xTqHBL
h3tx4VgMtrQ+WEgCjhoTwo23KMBAuJGSYnRmoBZM3lMfTKevIkAidPExvYCdm5dYq3XToLkkLv5L
2pIIVOFMDG+KESnAFV7l2c+cnzRMW0+b6f8mR1CJzZuxVLL6Q02fvLi55/mbSYxECQQDeAw6fiIQ
XGukBI4eMZZt4nscy2o12KyYner3VpoeE+Np2q+Z3pvAMd/aNzQ/W9WaI+NRfcxUJrmfPwIGm63i
AoGAFklyR1uZ/wPJjj611cdBcztlPdqoxssQGnh85BzCj/u3WqBpE2vjvyyvyI5kX6zk7S0ljKtt
2jny2+00VsBerQJBAJGC1Mg5Oydo5NwD6BiROrPxGo2bpTbu/fhrT8ebHkTz2eplU9VQQSQzY1oZ
MVX8i1m5WUTLPz2yLJIBQVdXqhMCQQCC4kXJEsHAve77oP6HtG/IiEn7kpyUXRNvFsDE0czpJJBv
L/zqaTFJkLC2FhpjvO4ySkHpA+Q5jNz6xZTrRVf9AkEAho1V2tUZn+pSyYrqReDGH53eXI37oQ2R
kod5yhbMxJ8HSWh/RZkDAUZdGsaqZd5hBv7XX5xJMh2aBeBYzNbrfwJBAKBOGASoQ+cLlyDbXadN
rIlWfZsZgGLAZctRi6IvsV6eepb+YhN610vVgtNn/hyNTdF3/6HzJKSCKh9jNz/t1sE=
-----END RSA PRIVATE KEY-----');
$privateKey = $rsa->toString(RSA::FORMAT_PKCS1);
$publicKey = $rsa->getPublicKey()->toString(RSA::FORMAT_PKCS1);

// Menyimpan kunci ke file
file_put_contents('private.pem', $privateKey);
file_put_contents('public.pem', $publicKey);

// Membaca kunci dari file
$privateKey = file_get_contents('private.pem');