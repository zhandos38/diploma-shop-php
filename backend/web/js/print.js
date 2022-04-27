qz.security.setCertificatePromise(function (resolve, reject) {
    resolve("-----BEGIN CERTIFICATE-----\n"
        + "MIIECzCCAvOgAwIBAgIJAL3DheFQ/5HqMA0GCSqGSIb3DQEBCwUAMIGaMQswCQYD"
        + "VQQGEwJLWjEZMBcGA1UECAwQU291dGggS2F6YWtoc3RhbjERMA8GA1UEBwwIU2h5"
        + "bWtlbnQxEjAQBgNVBAoMCVRNVC1Hcm91cDEMMAoGA1UECwwDSU1TMRcwFQYDVQQD"
        + "DA4qLnRtdC1ncm91cC5rejEiMCAGCSqGSIb3DQEJARYTdG9vZ21zb2Z0QGdtYWls"
        + "LmNvbTAgFw0yMDAyMTkwOTEyMTZaGA8yMDUxMDgxNDA5MTIxNlowgZoxCzAJBgNV"
        + "BAYTAktaMRkwFwYDVQQIDBBTb3V0aCBLYXpha2hzdGFuMREwDwYDVQQHDAhTaHlt"
        + "a2VudDESMBAGA1UECgwJVE1ULUdyb3VwMQwwCgYDVQQLDANJTVMxFzAVBgNVBAMM"
        + "DioudG10LWdyb3VwLmt6MSIwIAYJKoZIhvcNAQkBFhN0b29nbXNvZnRAZ21haWwu"
        + "Y29tMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2kUPBlHrf6d6hSVk"
        + "KlP2pr1K4ok2kbLgZGcqDKRthmOLqxTbVkeIUCskU5+XvYcCSkaRsVf7adMVOS+m"
        + "acKDP6r3rkDRIeB1qHXTJfg6D/dyD1jFMb98EPufrNwHD5ezuaDqKNfc3xTThHt9"
        + "wvYE3DvRo8ZOK1whmA1CBO6yEgqL7MPGCzylDwgxT7CnFDrNZRr+DWpsBqHmnMhh"
        + "3U/KQCT4K8FpekE/FQPChAnkJ82HcoyuT7FyPzSo+qZA0RbkRUybyJSu4BJJjxcv"
        + "qWKvCvphzB6Z5AzjYA4RsBiG5GqbhyJkPqy4Ugp4XL6nq1jquV9apMjoPpQR0KZx"
        + "s8v3PQIDAQABo1AwTjAdBgNVHQ4EFgQU3SoOb6jQzTbOSRKfImtnjzQrqHUwHwYD"
        + "VR0jBBgwFoAU3SoOb6jQzTbOSRKfImtnjzQrqHUwDAYDVR0TBAUwAwEB/zANBgkq"
        + "hkiG9w0BAQsFAAOCAQEABgmTjZZW85rG9mO6CBmjzHUqMR6uPxP8g23N1CJnAx/x"
        + "fqsGfH4yAGibCB55lxpZhR4X6q3YfXqdtgThD3gEMErf5bopRuO9fP1w39sz6cpJ"
        + "+jVKT7NMCzCY2ElIAOU7cbD/pNCm87GXznsODH8KuMYwinbq0JcFGc/0jlgAB5ob"
        + "rps076bJGQODMNu3GghvBApg9kVcMSM1zDjzNDWS8tzRkZ5iuZiKNqA9HkYpTFSn"
        + "BKiro6cXFKYc7FhQqPX5JI7rlvduK3jJEdHO/+fq/Jqxmx13GlXm9cQQVtoT9EJ7"
        + "YomfRz1sq5sXQ6zvbhD54HT/04vlhBYrFSPAwuKjGw==\n"
        + "-----END CERTIFICATE-----");
});

let privateKey = "-----BEGIN RSA PRIVATE KEY-----\n"
    +"MIIEogIBAAKCAQEA2kUPBlHrf6d6hSVkKlP2pr1K4ok2kbLgZGcqDKRthmOLqxTb"
    +"VkeIUCskU5+XvYcCSkaRsVf7adMVOS+macKDP6r3rkDRIeB1qHXTJfg6D/dyD1jF"
    +"Mb98EPufrNwHD5ezuaDqKNfc3xTThHt9wvYE3DvRo8ZOK1whmA1CBO6yEgqL7MPG"
    +"CzylDwgxT7CnFDrNZRr+DWpsBqHmnMhh3U/KQCT4K8FpekE/FQPChAnkJ82Hcoyu"
    +"T7FyPzSo+qZA0RbkRUybyJSu4BJJjxcvqWKvCvphzB6Z5AzjYA4RsBiG5GqbhyJk"
    +"Pqy4Ugp4XL6nq1jquV9apMjoPpQR0KZxs8v3PQIDAQABAoIBAHezacL4iCMw0ONW"
    +"FzGTbHAS3Y+Q2mla5O6LGSdnwVzzGLSRMpyFjD8S+dAWdNwOv3XGb74HVyy5Aymi"
    +"dSwI7XusIjrg9xASDdR+EXcAQ69f76B0+WgH8F1L8UyWOhUWCA1kLyaJA2sf+8Pr"
    +"CZQy4YV6FMUxSstCsnW1x5/225dCSCPkUnh/qpRMVLd//uUAZMJJ+jnng56dGi0Q"
    +"A2kFKkcevzeEGDn8oYw6JF2leHr8tHnU/OWFpGHm6TtgdIgYNQPtUP9Sq/uFOh+N"
    +"PYua8zk2CUHsA4oMnC7sdOBWuUmVOVPyd+SwSR0cIg9uTDzrbZOmVMA9Izj3dmtG"
    +"Syoya6ECgYEA7oNZ1f6UNikhEOMDIfGx4riT8HcY1GspPbl+BJLnWExFDHAfWQtr"
    +"OJfp0jbD4QzEhu7g3gWhcbr2BaYRleM1i3K1vdJavDYvjU24CngVa3qHiMQSBbHt"
    +"eG/hPUDDK+UsYwi0w/ukTs5zzGQasLaI1AdmRNh3wRZgbofeGuQQcjUCgYEA6kXC"
    +"0C7yMGcq8x/0BpPI+T4Gy+p7v40MtyWApqI8JXr6v/1z1tLDOXl+BhldIbzJACA6"
    +"BZ7/dNs0ZP1fIFn94x4d8a4laSZXMgg8ujAmybE3/SbA5zRLStxIo3tAsBOW1fwK"
    +"PF7spiIauEhT4OGZE2sNVRZNWm0UzsN+9tQUkekCgYBxebSoBzLkgbTln9vBrof/"
    +"YemgokkB5un8H+BAtNO0QrUnMcD4UGJ2zm/EP6H51GU7/TKm7u7ceSLLlTMQqMS0"
    +"z6J/6TCaEv2UsME62d72/5i0DPS2GOzuO+xhhApXO/VeOKooA/UsOTUGrSm1oWJ/"
    +"3fVeE88F4muGqsWU7aSVcQKBgBc8PAox3ct3MAdVD/rnBXPS9xGafBOPhcdUbOIa"
    +"DSUagWwxUx/nX31/00P/mAEUnErq51ZPYr7QTu4FQz4OLuQrxISH5SX8q4FG198P"
    +"j4lJjmgJQ/Cqex09o+ay/sN37enjSZCbSZVgpI3Kfqc7ONd4MqZRw/JIB1xKf3kz"
    +"p6ahAoGAA1/qb9WbKbeANRkeXVxuUki9ZIgm56bjO6hxaH9t2b+jEM7pbl6ZC5jW"
    +"5pkdJFsCyB5RKkwHk6E+Vcg+FhfHmYnjiIl0GJwyIOK9Gai/4ZDwAvQgJIIE40dd"
    +"32Lm5leCFOvjd8sRqNagVGGrZgBl8b/AUo9lHJYGuyFVgfBDNFQ=\n"
    +"-----END RSA PRIVATE KEY-----";

qz.security.setSignaturePromise(function (toSign) {
    return function (resolve, reject) {
        try {
            let pk = new RSAKey();
            pk.readPrivateKeyFromPEMString(strip(privateKey));
            let hex = pk.signString(toSign, 'sha1');
            console.log("DEBUG: \n\n" + stob64(hextorstr(hex)));
            resolve(stob64(hextorstr(hex)));
        } catch (err) {
            console.error(err);
            reject(err);
        }
    };
});

function strip(key) {
    if (key.indexOf('-----') !== -1) {
        return key.split('-----')[2].replace(/\r?\n|\r/g, '');
    }
}

qz.websocket.connect().catch(function(e) { console.error(e); });

function print(content) {
    qz.printers.getDefault().then(function (printer) {
        let config = qz.configs.create(printer);
        let data = [{
            type: 'pixel',
            format: 'html',
            flavor: 'plain',
            data: content
        }];
        return qz.print(config, data).catch(function(e) { console.error(e); });
    });
}