APP_ID = "b4341539b81a46dc9a89026d222baadb";
WEBSITE_URL = "https://www.denoserverless.com";
API_URL = "https://eu-gb.functions.cloud.ibm.com/api/v1/web/sinevia_live/default/api.denoserverless.com";

if (location.hostname === "localhost" || location.hostname === "127.0.0.1" || location.hostname === "") {
    WEBSITE_URL = window.location.protocol + '//' + window.location.hostname + ':' + window.location.port;
}