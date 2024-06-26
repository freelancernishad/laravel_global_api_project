<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = auth()->id();
        $visitDate = Carbon::now()->toDateString();

        $visitor = Visitor::where([
            'page' => $request->path(),
            'user_id' => $userId,
            'device' => $request->userAgent(),
            'ip_address' => $request->ip(),
            'visit_date' => $visitDate,
            'accept' => $request->header('accept'),
            'accept_charset' => $request->header('accept-charset'),
            'accept_encoding' => $request->header('accept-encoding'),
            'accept_language' => $request->header('accept-language'),
            'accept_datetime' => $request->header('accept-datetime'),
            'access_control_request_method' => $request->header('access-control-request-method'),
            'access_control_request_headers' => $request->header('access-control-request-headers'),
            'authorization' => $request->header('authorization'),
            'cache_control' => $request->header('cache-control'),
            'connection' => $request->header('connection'),
            'cookie' => $request->header('cookie'),
            'content_length' => $request->header('content-length'),
            'content_md5' => $request->header('content-md5'),
            'content_type' => $request->header('content-type'),
            'expect' => $request->header('expect'),
            'forwarded' => $request->header('forwarded'),
            'from' => $request->header('from'),
            'host' => $request->header('host'),
            'if_match' => $request->header('if-match'),
            'if_modified_since' => $request->header('if-modified-since'),
            'if_none_match' => $request->header('if-none-match'),
            'if_range' => $request->header('if-range'),
            'if_unmodified_since' => $request->header('if-unmodified-since'),
            'max_forwards' => $request->header('max-forwards'),
            'origin' => $request->header('origin'),
            'pragma' => $request->header('pragma'),
            'proxy_authorization' => $request->header('proxy-authorization'),
            'range' => $request->header('range'),
            'referer' => $request->header('referer'),
            'te' => $request->header('te'),
            'user_agent' => $request->header('user-agent'),
            'upgrade' => $request->header('upgrade'),
            'via' => $request->header('via'),
            'warning' => $request->header('warning'),
            'x_requested_with' => $request->header('x-requested-with'),
            'x_forwarded_for' => $request->header('x-forwarded-for'),
            'x_forwarded_host' => $request->header('x-forwarded-host'),
            'x_forwarded_proto' => $request->header('x-forwarded-proto'),
            'front_end_https' => $request->header('front-end-https'),
            'x_http_method_override' => $request->header('x-http-method-override'),
            'x_att_deviceid' => $request->header('x-att-deviceid'),
            'x_wap_profile' => $request->header('x-wap-profile'),
            'proxy_connection' => $request->header('proxy-connection'),
            'x_uidh' => $request->header('x-uidh'),
            'x_csrf_token' => $request->header('x-csrf-token'),
            'x_request_id' => $request->header('x-request-id'),
            'x_correlation_id' => $request->header('x-correlation-id'),
            'x_flash_version' => $request->header('x-flash-version'),
            'x_real_ip' => $request->header('x-real-ip'),
            'x_requested_with_aka' => $request->header('x-requested-with-aka'),
            'x_operamini_phone_ua' => $request->header('x-operamini-phone-ua'),
            'x_operamini_phone' => $request->header('x-operamini-phone'),
            'x_operamini_features' => $request->header('x-operamini-features'),
            'x_att_apollo_deviceid' => $request->header('x-att-apollo-deviceid'),
            'x_att_deviceos' => $request->header('x-att-deviceos'),
            'x_att_platform' => $request->header('x-att-platform'),
            'x_att_appversion' => $request->header('x-att-appversion'),
            'x_att_mobile_version' => $request->header('x-att-mobile-version'),
            'x_saf_version' => $request->header('x-saf-version'),
            'x_ucbrowser_deviceua' => $request->header('x-ucbrowser-deviceua'),
            'x_ucbrowser_device' => $request->header('x-ucbrowser-device'),
            'x_ucbrowser_ua' => $request->header('x-ucbrowser-ua'),
            'x_ucbrowser_device_features' => $request->header('x-ucbrowser-device-features'),
            'x_source_scheme' => $request->header('x-source-scheme'),
            'x_forwarded_proto' => $request->header('x-forwarded-proto'),
            'x_forwarded_port' => $request->header('x-forwarded-port'),
            'x_forwarded_host' => $request->header('x-forwarded-host'),
            'x_forwarded_server' => $request->header('x-forwarded-server'),
            'x_proxy_user_ip' => $request->header('x-proxy-user-ip'),
            'x_wap_clientid' => $request->header('x-wap-clientid'),
            'x_att_proxy_user_ip' => $request->header('x-att-proxy-user-ip'),
            'x_forwarded_scheme' => $request->header('x-forwarded-scheme'),
            'x_att_auth_status' => $request->header('x-att-auth-status'),
            'x_custom_header' => $request->header('x-custom-header'),
        ])->first();

        if (!$visitor) {
            Visitor::create([
                'page' => $request->path(),
                'user_id' => $userId,
                'device' => $request->userAgent(),
                'ip_address' => $request->ip(),
                'visit_date' => $visitDate,
                'accept' => $request->header('accept'),
                'accept_charset' => $request->header('accept-charset'),
                'accept_encoding' => $request->header('accept-encoding'),
                'accept_language' => $request->header('accept-language'),
                'accept_datetime' => $request->header('accept-datetime'),
                'access_control_request_method' => $request->header('access-control-request-method'),
                'access_control_request_headers' => $request->header('access-control-request-headers'),
                'authorization' => $request->header('authorization'),
                'cache_control' => $request->header('cache-control'),
                'connection' => $request->header('connection'),
                'cookie' => $request->header('cookie'),
                'content_length' => $request->header('content-length'),
                'content_md5' => $request->header('content-md5'),
                'content_type' => $request->header('content-type'),
                'expect' => $request->header('expect'),
                'forwarded' => $request->header('forwarded'),
                'from' => $request->header('from'),
                'host' => $request->header('host'),
                'if_match' => $request->header('if-match'),
                'if_modified_since' => $request->header('if-modified-since'),
                'if_none_match' => $request->header('if-none-match'),
                'if_range' => $request->header('if-range'),
                'if_unmodified_since' => $request->header('if-unmodified-since'),
                'max_forwards' => $request->header('max-forwards'),
                'origin' => $request->header('origin'),
                'pragma' => $request->header('pragma'),
                'proxy_authorization' => $request->header('proxy-authorization'),
                'range' => $request->header('range'),
                'referer' => $request->header('referer'),
                'te' => $request->header('te'),
                'user_agent' => $request->header('user-agent'),
                'upgrade' => $request->header('upgrade'),
                'via' => $request->header('via'),
                'warning' => $request->header('warning'),
                'x_requested_with' => $request->header('x-requested-with'),
                'x_forwarded_for' => $request->header('x-forwarded-for'),
                'x_forwarded_host' => $request->header('x-forwarded-host'),
                'x_forwarded_proto' => $request->header('x-forwarded-proto'),
                'front_end_https' => $request->header('front-end-https'),
                'x_http_method_override' => $request->header('x-http-method-override'),
                'x_att_deviceid' => $request->header('x-att-deviceid'),
                'x_wap_profile' => $request->header('x-wap-profile'),
                'proxy_connection' => $request->header('proxy-connection'),
                'x_uidh' => $request->header('x-uidh'),
                'x_csrf_token' => $request->header('x-csrf-token'),
                'x_request_id' => $request->header('x-request-id'),
                'x_correlation_id' => $request->header('x-correlation-id'),
                'x_flash_version' => $request->header('x-flash-version'),
                'x_real_ip' => $request->header('x-real-ip'),
                'x_requested_with_aka' => $request->header('x-requested-with-aka'),
                'x_operamini_phone_ua' => $request->header('x-operamini-phone-ua'),
                'x_operamini_phone' => $request->header('x-operamini-phone'),
                'x_operamini_features' => $request->header('x-operamini-features'),
                'x_att_apollo_deviceid' => $request->header('x-att-apollo-deviceid'),
                'x_att_deviceos' => $request->header('x-att-deviceos'),
                'x_att_platform' => $request->header('x-att-platform'),
                'x_att_appversion' => $request->header('x-att-appversion'),
                'x_att_mobile_version' => $request->header('x-att-mobile-version'),
                'x_saf_version' => $request->header('x-saf-version'),
                'x_ucbrowser_deviceua' => $request->header('x-ucbrowser-deviceua'),
                'x_ucbrowser_device' => $request->header('x-ucbrowser-device'),
                'x_ucbrowser_ua' => $request->header('x-ucbrowser-ua'),
                'x_ucbrowser_device_features' => $request->header('x-ucbrowser-device-features'),
                'x_source_scheme' => $request->header('x-source-scheme'),
                'x_forwarded_proto' => $request->header('x-forwarded-proto'),
                'x_forwarded_port' => $request->header('x-forwarded-port'),
                'x_forwarded_host' => $request->header('x-forwarded-host'),
                'x_forwarded_server' => $request->header('x-forwarded-server'),
                'x_proxy_user_ip' => $request->header('x-proxy-user-ip'),
                'x_wap_clientid' => $request->header('x-wap-clientid'),
                'x_att_proxy_user_ip' => $request->header('x-att-proxy-user-ip'),
                'x_forwarded_scheme' => $request->header('x-forwarded-scheme'),
                'x_att_auth_status' => $request->header('x-att-auth-status'),
                'x_custom_header' => $request->header('x-custom-header'),
            ]);
        }

        return $next($request);
    }
}
