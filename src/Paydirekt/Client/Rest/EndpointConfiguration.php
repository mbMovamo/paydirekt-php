<?php


namespace Paydirekt\Client\Rest;

/**
 * Rest Endpoints.
 */
class EndpointConfiguration
{
    const ENDPOINT_SANDBOX = 'sandbox';
    const ENDPOINT_PRODUCTION = 'production';
    
    static $endpoint_switch = self::ENDPOINT_SANDBOX;

    const SANDBOX_CHECKOUT_ENDPOINT = "https://api.sandbox.paydirekt.de/api/checkout/v1/checkouts";
    const PRODUCTION_CHECKOUT_ENDPOINT = "https://api.paydirekt.de/api/checkout/v1/checkouts";

    const SANDBOX_TOKEN_OBTAIN_ENDPOINT = "https://api.sandbox.paydirekt.de/api/merchantintegration/v1/token/obtain";
    const PRODUCTION_TOKEN_OBTAIN_ENDPOINT = "https://api.paydirekt.de/api/merchantintegration/v1/token/obtain";

    const SANDBOX_TRANSACTION_REPORTS_ENDPOINT = "https://api.sandbox.paydirekt.de/api/reporting/v1/reports/transactions";
    const PRODUCTION_TRANSACTION_REPORTS_ENDPOINT = "https://api.paydirekt.de/api/reporting/v1/reports/transactions";

    public static function setEndpoint($endpoint) {
        self::$endpoint_switch = $endpoint;
    }

    public static function getCheckoutEndpoint() {
        return self::isProduction() ? self::PRODUCTION_CHECKOUT_ENDPOINT : self::SANDBOX_CHECKOUT_ENDPOINT;
    }

    public static function getTokenObtainEndpoint() {
        return self::isProduction() ? self::PRODUCTION_TOKEN_OBTAIN_ENDPOINT : self::SANDBOX_TOKEN_OBTAIN_ENDPOINT;
    }

    public static function getTransactionReportsEndpoint() {
        return self::isProduction() ? self::PRODUCTION_TRANSACTION_REPORTS_ENDPOINT : self::SANDBOX_TRANSACTION_REPORTS_ENDPOINT;
    }

    private static function isProduction() {
        return "production" == self::ENDPOINT_SWITCH;
    }

    public static function getCaFile() {
        return realpath(dirname(__FILE__)) . "/cacert.pem";
    }
}
