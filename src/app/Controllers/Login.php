<?php
/**
 * Created by PhpStorm.
 * User: hainuo
 * Date: 16/9/7
 * Time: 下午4:54
 */
namespace app\Controllers;

use Lcobucci\JWT\Configuration;

class Login extends base
{
    public function http_index()
    {
        $this->server->reload();
//        $this->dump($this->config->get('server.set'));
        $json = [
            "sub" => "1",
            "iss" => "http://localhost:8000/auth/login",
            "iat" => 1451888119,
            "exp" => 1454516119,
            "nbf" => 1451888119,
            "jti" => "37c107e4609ddbcc9c096ea5ee76c667",
        ];
        $header = [
            "typ" => "JWT",
            "alg" => "HS256",
        ];

        $base64json = base64_encode($json);
        $base64header = base64_encode($header);

        $sha256Secret = '';
        $config = new Configuration();
        $config = new Configuration();
        $signer = $config->getSigner(); // Default signer is HMAC SHA256

        $token = $config->createBuilder()
            ->setIssuer('http://example.com')// Configures the issuer (iss claim)
            ->setAudience('http://example.org')// Configures the audience (aud claim)
            ->setId('4f1g23a12aa', true)// Configures the id (jti claim), replicating as a header item
            ->setIssuedAt(time())// Configures the time that the token was issue (iat claim)
            ->setNotBefore(time() + 60)// Configures the time that the token can be used (nbf claim)
            ->setExpiration(time() + 3600)// Configures the expiration time of the token (exp claim)
            ->set('uid', 1)// Configures a new claim, called "uid"
            ->sign($signer, 'testing')// creates a signature using "testing" as key
            ->getToken(); // Retrieves the generated token

        $this->json(['token' => $token->__toString()]);

//        echo $token->getHeader('jti'); // will print "4f1g23a12aa"
//        echo $token->getClaim('iss'); // will print "http://example.com"
//        echo $token->getClaim('uid'); // will print "1"
//        echo $token->getPayload(); // The string representation of the object is a JWT string (pretty easy, right?)
//        $this->display(null, [
//            'dumps' => [
//                'a'     => 2134234,
//                'token' => $token->getPayload(),
//            ],
//        ]);
//        $this->http_output->response->write(123412);
//        $this->http_output->response->end();

    }
}