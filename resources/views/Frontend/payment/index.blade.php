	@extends('Frontend.master')
    @section('script')
        <script type="text/javascript">
            var parseQueryString = function(url) {
                    
                var str = url;
                var objURL = {};

                str.replace(
                new RegExp("([^?=&]+)(=([^&]*))?", "g"),
                function($0, $1, $2, $3) {
                    
                    if($3 != undefined && $3 != null)
                        objURL[$1] = decodeURIComponent($3);
                    else
                        objURL[$1] = $3;
                });
                    
                return objURL;
            }; 
        </script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                setTimeout(function(){
                var stepCheckout = parseInt($('.step-sections').attr('step'));
                        if (stepCheckout === 1) {
                            var flagVal = 0;
                            $('body').on('change', '#stored_addresses', function() {
                                    flagVal = $(this).val();
                            });
                            $('body').on('click', '.step-footer-continue-btn', function() {
                                    $(document).ajaxComplete(function(event, xhr, settings) {
                                            
                                            if (settings.url.indexOf("form_next_step") > -1 ) {
                                                    $('#stored_addresses').val(flagVal);
                                            }
                                    });
                            })
                            function check_required(){
                                    $('.field-required').each(function(){
                                        var self = $(this).find('input');
                                        var selfSelect = $(this).find('select');

                                            if(self.val() !== ''){
                                            self.parent().next().remove();
                                            self.parents('.field-error').removeClass('field-error')
                                            }

                                            if(selfSelect !== null || selfSelect !== 0){
                                            selfSelect.parent().next().remove();
                                            selfSelect.parents('.field-error').removeClass('field-error')
                                            }
                                    });								
                            }
                            $('body').on('change', '#stored_addresses', function(){
                                    check_required();
                            });
                                
                    } 
                },0)
                })
        </script>
        
        <script type="text/javascript">
            window.onpageshow = function(event) {
                if (event.persisted) {
                    var currentUrl = '';
                    
                        currentUrl = '/checkouts/e97e81ee32784452b2ca3e9c1f8fb9fa?step=1';
                    
                        
                    if(currentUrl)
                        window.location = currentUrl;
                }
            };

            

            var isInit = false;

            const paylayterLoadingTrigger = ( isLoading = true ) => {
                                    if(isLoading) {
                                                $('.payment-later-table').addClass('hidden');
                                                $('.paylater--ul').addClass('hidden');
                                                $('.payment-later-table--loading').addClass('show');
                                                $('.checkout-payment__loading--box').addClass('show');
                                    }else{
                                                $('.checkout-payment__loading--box').removeClass('show');
                                                $('.payment-later-table--loading').removeClass('show');
                                                $('.payment-later-table').removeClass('hidden');
                                                $('.paylater--ul').removeClass('hidden');
                                    }
                            }
                
            function funcFormOnSubmit(e) {
            
                if(!isInit) {
                    isInit = true;

                    $.fn.tagName = function() {
                        return this.prop("tagName").toLowerCase();
                    };
                }

                // update new version 
                let oldVer = $('.checkout_version')
                $(oldVer).attr('data_checkout_version', oldVer++ );
                //----------

                if(typeof(e) == 'string') {
                    var element = $(e);
                    var formData = e;
                } else {
                    var element = this;
                    var formData = this;
                    //e.preventDefault();
                    let formIdCheck = $(element).attr('id'), replaceElement = [], funcCallback;
                    e.preventDefault();
                }
                    
                $(element).find('button:submit').addClass('btn-loading');
                let formId = $(element).attr('id'), replaceElement = [], funcCallback;	
                
                if(formId == undefined || formId == null || formId == '')
                    return;

                    const findPaymentMethodId = $('body').find('input:radio[name$="payment_method_id"]:checked').attr('type-id');

                    const isReePay=findPaymentMethodId == 41 || findPaymentMethodId == 43
                                

                        if( ['section-payment-method','form_discount_add','section-shipping-rate'].includes(formId) && isReePay ){
                            if(findPaymentMethodId == 41){
                                    $('#section-pay-later-method').removeClass('hidden');
                            }
                            if(findPaymentMethodId == 43){
                                $('#section-pay-later-method-kredivo').removeClass('hidden');
                            }
                                    paylayterLoadingTrigger()
                            }

                if(formId == 'form_update_location_customer_shipping' ||  formId == 'form_update_shipping_method' || formId=='section-shipping-rate' || formId=='section-payment-method'){
                    if($('.order-checkout__loading--box').length > 0 ) {
                        $('#'+formId).find('.order-checkout__loading--box').addClass('show');
                        $('body').find('button:submit').addClass('btn-loading');
                    }
                }
                    
                
                
                    if(formId == 'form_next_step' || formId=="checkout_complete") {
                        formData = '.section-customer-information';
                        replaceElement =	[...replaceElement,
                        '#checkout_order_information_changed_error_message',
                        '.step-sections',
                        '.order-summary-sections'
                        ]
                    } 
                    else if(
                        formId == 'form_redeem_add'
                        || formId == 'form_redeem_remove'
                        || formId == 'form_discount_add'
                        || formId == 'form_discount_remove'
                        || formId == 'form_update_location_customer_shipping'
                        || formId == 'form_update_shipping_method'
                        || formId=="checkout_complete"
                        
                        ) {
                        replaceElement = [...replaceElement, '#checkout_order_information_changed_error_message',
                        '#form_update_location_customer_shipping',
                        '#change_pick_location_or_shipping',
                        '.inventory_location',
                        '.inventory_location_data',	
                        '.order-summary-toggle-inner .order-summary-toggle-total-recap',
                        '.order-summary-sections'
                        ]
                    }

                    
                            replaceElement=[...replaceElement,'#checkout_order_information_changed_error_message']
                        if(formId == 'form_update_location_customer_shipping'|| formId == 'form_update_shipping_method') {
                            formId = 'form_update_shipping_method';
                            replaceElement=[...replaceElement,'#form_update_location_customer_shipping',
                            '#change_pick_location_or_shipping',
                            '.inventory_location',
                            '.inventory_location_data',
                            '.order-summary-toggle-inner .order-summary-toggle-total-recap',
                            '.order-summary-sections'
                            ]
                        }
                        if(formId == 'form_update_location_customer_pick_at_location' || formId == 'form_update_shipping_method') {
                            formId = 'form_update_shipping_method';
                            replaceElement = [...replaceElement,'#form_update_location_customer_pick_at_location',
                            '#change_pick_location_or_shipping',
                            '.inventory_location',
                            '.inventory_location_data',
                            '.order-summary-toggle-inner .order-summary-toggle-total-recap',
                            '.order-summary-sections',
                            '.order-summary-section.order-summary-section-total-lines.total-line-table.total-line-table-footer',
                            '.order-summary-section.order-summary-section-total-lines.total-line-table.total-line.total-line-redeem',
                            '.order-summary-section.order-summary-section-redeem.redeem-login-section'
                        ]
                        }

                    

                

                        replaceElement.push('#section-pay-later-method');
                        replaceElement.push('#section-pay-later-method-kredivo')
                    if(!$(formData) || $(formData).length == 0) {
                    window.location.reload();
                    return false;
                        }

                var inputurl='';
                    
                if(($(formData).tagName() != 'form' && $(formData).tagName() != 'input'&& $(formData).tagName() != 'div')
                    ||($(formData).tagName() == 'input'|| $(formData).tagName() == 'div') )
                {
                    
                formData += ' :input';
                }
                try
                {
                    
                    var listparameters = new URLSearchParams($(formData).serialize());
                        
                    var countrytmp = $('body').find('input[name$="selected_customer_shipping_country"]').val();
                    if( countrytmp && countrytmp!='' )
                    {
                        listparameters.set('customer_shipping_country',countrytmp);
                    }
                        
                    if($('body').find('#customer_pick_at_location_true').length != 0 && $('body').find('#customer_pick_at_location_true').is(':checked')){
                        let location_id_checked = $('.inventory_location input[name="inventory_location_id"]:checked').val();
                        listparameters.set('inventory_location_id',location_id_checked);
                    }

                    if($('body').find('#section-shipping-rate').length != 0){
                        let shipping_rate_id_checked = $('#section-shipping-rate input[name="shipping_rate_id"]:checked').val();
                        listparameters.set('shipping_rate_id',shipping_rate_id_checked);
                    }


                    var provincetmp = $('body').find('input[name$="selected_customer_shipping_province"]').val();
                    if( provincetmp && provincetmp!='' && provincetmp!="null")
                    {
                        listparameters.set('customer_shipping_province',provincetmp);
                        var districttmp = $('body').find('input[name$="selected_customer_shipping_district"]').val();
                        if(districttmp && districttmp!='' && districttmp!="null")
                        {
                            listparameters.set('customer_shipping_district',districttmp);
                            var wardtmp = $('body').find('input[name$="selected_customer_shipping_ward"]').val();
                            if(wardtmp && wardtmp!='') listparameters.set('customer_shipping_ward',wardtmp);
                        }
                        else
                        {
                            var districtid = listparameters.get('customer_shipping_district');
                            if( districtid==null || districtid=='' || districtid=="null" || districtid=='null')
                            {
                                    listparameters.set('customer_shipping_district','');
                                    listparameters.set('customer_shipping_ward','');
                            }
                        }
                    }
                    else
                    {
                        var provinceid = listparameters.get('customer_shipping_province');
                        if(provinceid==null || provinceid=='' || provinceid=="null" || provinceid=='null')
                        {
                                var district = listparameters.get('customer_shipping_district')
                                if(district && district!='')
                                {
                                    listparameters.set('customer_shipping_district','');
                                }

                                var ward = listparameters.get('customer_shipping_ward')
                                if(ward && ward!='')
                                {
                                    listparameters.set('customer_shipping_ward','');
                                }
                        }
                    }
                        
                        
                        


                    var address1tmp = $('body').find('input[name$="billing_address[address1]"]').val();
                    if(address1tmp!='' && address1tmp!=undefined) listparameters.set('billing_address[address1]',address1tmp);
                        
                    var phonetmp = $('body').find('input[name$="billing_address[phone]"]').val();
                    if(phonetmp!='' && phonetmp!=undefined) listparameters.set('billing_address[phone]',phonetmp);

                    var emailtmp = $('body').find('input[name$="checkout_user[email]"]').val();
                    if(emailtmp!='' && emailtmp!=undefined) listparameters.set('checkout_user[email]',emailtmp);

                    var fullnametmp = $('body').find('input[name$="billing_address[full_name]"]').val();
                    if(fullnametmp!='' && fullnametmp!=undefined) listparameters.set('billing_address[full_name]',fullnametmp);


                    listparameters.delete('selected_customer_shipping_country');
                    listparameters.delete('selected_customer_shipping_province');
                    listparameters.delete('selected_customer_shipping_district');
                    listparameters.delete('selected_customer_shipping_ward');
                        
                    if($('body').find('input[name$="customer_pick_at_location"]')){
                        var optionShippingtmp = $('body').find('input[name$="customer_pick_at_location"]:checked').val();
                        if(optionShippingtmp!='' && optionShippingtmp!=undefined) listparameters.set('customer_pick_at_location',optionShippingtmp);
                            
                    }
                    else
                    {
                        listparameters.append("customer_pick_at_location",false);
                    }
                        
                        
                    if( formId == 'form_next_step' || formId == 'form_update_shipping_method' || formId=='section-payment-method' || formId=='section-shipping-rate' )
                    {
                            var version = Number($('body').find('.checkout_version').attr("data_checkout_version"));
                            if(version)
                                listparameters.append("version",version);
                    }
                        
                    inputurl = listparameters.toString();
                        
                } catch(err) 
                {
                        
                    // Older Browser URLSearchParams not support
                    var listparameters = parseQueryString($(formData).serialize());
                    if( formId == 'form_next_step' )
                    {
                            var version = Number($('body').find('.checkout_version').attr("data_checkout_version"));
                            listparameters.version=version;
                    }
                    var countrytmp = $('body').find('input[name$="selected_customer_shipping_country"]').val();
                    if(countrytmp!='') 
                    {
                        listparameters.customer_shipping_country = countrytmp;
                    }
                        
                    var provincetmp = $('body').find('input[name$="selected_customer_shipping_province"]').val();
                    if(provincetmp!='' && listparameters.customer_shipping_province) listparameters.customer_shipping_province = provincetmp;

                    var districttmp = $('body').find('input[name$="selected_customer_shipping_district"]').val();
                    if(districttmp!='' && listparameters.customer_shipping_district) listparameters.customer_shipping_district = districttmp;

                    var wardtmp = $('body').find('input[name$="selected_customer_shipping_ward"]').val();
                    if(wardtmp!='' && listparameters.customer_shipping_ward) listparameters.customer_shipping_ward = wardtmp;

                        
                    var address1tmp = $('body').find('input[name$="billing_address[address1]"]').val();
                    if(address1tmp!='' && listparameters.billing_address[address1] && address1tmp!=undefined) listparameters.set('billing_address[address1]',address1tmp);

                    var phonetmp = $('body').find('input[name$="billing_address[phone]"]').val();
                    if(phonetmp!='' && listparameters.billing_address[phone] && phonetmp!=undefined) listparameters.set('billing_address[phone]',phonetmp);

                    var emailtmp = $('body').find('input[name$="checkout_user[email]"]').val();
                    if(emailtmp!='' && listparameters.checkout_user[email] && emailtmp!=undefined) listparameters.set('checkout_user[email]',emailtmp);


                    var fullnametmp = $('body').find('input[name$="billing_address[full_name]"]').val();
                    if(fullnametmp!='' && listparameters.billing_address[full_name] && fullnametmp!=undefined) listparameters.set('billing_address[full_name]',fullnametmp);

                        
                    delete listparameters.selected_customer_shipping_country;
                    delete listparameters.selected_customer_shipping_province;
                    delete listparameters.selected_customer_shipping_district;
                    delete listparameters.selected_customer_shipping_ward;
                        
                    if($('body').find('input[name$="customer_pick_at_location"]')){
                        var optionShippingtmp = $('body').find('input[name$="customer_pick_at_location"]:checked').val();
                        if(optionShippingtmp!='' && optionShippingtmp!=undefined) listparameters.set('customer_pick_at_location',optionShippingtmp);
                    }
                    else
                    {
                        listparameters.append("customer_pick_at_location",false);
                    }
                        
                    if( formId == 'form_next_step' || formId == 'form_update_shipping_method' || formId=='section-payment-method' || formId=='section-shipping-rate' )
                    {
                            var fiversion =$('body').find('.checkout_version').attr("data_checkout_version"); 
                            if(fiversion && fiversion !='')
                            {
                                    listparameters['version']=Number(fiversion);
                            }
                                    
                    }


                    var listObject = '';
                    for (var key in listparameters) {
                        listObject += '&' + key + '=' + encodeURIComponent(listparameters[key]);
                    };
                    inputurl = listObject.substring(1);
                        
                }
                
                
                
                let url = window.location.origin + window.location.pathname + '?' + inputurl + encodeURI('&form_name=' + formId)
                let data = '';
                var method="get";
                if(formId=="checkout_complete")
                { 
                    url = '/checkouts/complete';
                    method="post";
                    data = $('#'+formId).serialize()
                }


                $.ajax({
                    type: method,
                    url:url,
                    data: data,
                    success: function(html) {
                        if($(html).attr('id') == 'redirect-url') {
                            window.location = $(html).val();
                        } else {
                            if(replaceElement.length > 0) {
                                for (var i = 0; i < replaceElement.length; i++) 
                                {
                                    var tempElement = replaceElement[i];
                                    var newElement = $(html).find(tempElement);

                                    if(newElement.length > 0) {
                                        if(tempElement == '.step-sections')
                                            $(tempElement).attr('step', $(newElement).attr('step'));

                                        var listTempElement = $(tempElement);

                                        for(var j = 0; j < newElement.length; j++)
                                            if(j < listTempElement.length)
                                            {
                                                        
                                                                            if($(newElement[j]).attr('id') == 'checkout_order_information_changed_error_message')
                                                {
                                                    if($(newElement[j]).find('span').html().trim() != '')
                                                    {
                                                        $(listTempElement[j]).removeClass('hidden');
                                                        $("html, body").animate({ scrollTop: 0 }, "slow");
                                                        if($(window).width() <= 999){
                                                            $('.banner').addClass('error');
                                                        }
                                                    }
                                                    else{
                                                        $(listTempElement[j]).addClass('hidden');
                                                        if($(window).width() <= 999){
                                                            $('.banner').removeClass('error');
                                                        }
                                                    }
                                                }
                                                if($(newElement[j]).attr('class') == 'order-summary-sections' && formId == 'section-payment-method'){
                                                                const oldVersion = $('.checkout_version')
                                                                const newVersion = $(html).find('.checkout_version').attr('data_checkout_version')
                                                                    $(oldVersion).attr('data_checkout_version', newVersion );
                                                                    $(listTempElement[j]).html($(newElement[j]).html());
                                                        }else{
                                                        $(listTempElement[j]).html($(newElement[j]).html());
                                                        }
                                                            
                                            }
                                    }
                                }
                            }
                                
                            
                            
                                
                                var is_vietnam = $("#is_vietnam").val();
                                if(is_vietnam && is_vietnam == "true")
                                {
                                    //$("#div_location_country_not_vietnam").hide();
                                }
                                else
                                {
                                    $("#div_location_country_not_vietnam").show();
                                }
                            
                            
                                
                            $('body').attr('src', $(html).attr('src'));
                            $(element).find('button:submit').removeClass('btn-loading');
                            $('body').find('button:submit').removeClass('btn-loading');
                            if(($('body').find('.field-error') && $('body').find('.field-error').length > 0)
                                || ($('body').find('.has-error') && $('body').find('.has-error').length > 0))
                            {
                                $("html, body").animate({ scrollTop: 0 }, "slow");
                            }
                            if( ['section-payment-method','form_discount_add','section-shipping-rate','form_discount_remove'].includes(formId) && isReePay ){
                                    if(formId != 'section-payment-method'){
                                        paylayterLoadingTrigger()
                                        funcFormOnSubmit('#section-payment-method')
                                    }else{
                                        if(findPaymentMethodId==41){
                                            $('#section-pay-later-method').removeClass('hidden')
                                        }
                                            if(findPaymentMethodId==43){
                                            $('#section-pay-later-method-kredivo').removeClass('hidden')
                                            }
                                        paylayterLoadingTrigger(false)
                                    }
                            }else{
                                paylayterLoadingTrigger()
                            }

                            if(formId == 'form_update_location_customer_shipping' || formId == 'form_update_shipping_method' || formId=='section-shipping-rate' || formId=='section-payment-method'){
                                if($('.order-checkout__loading--box').length > 0) {
                                    $('.order-checkout__loading--box').removeClass('show');
                        }
                            }
                            if(funcCallback)
                                funcCallback();
                        }
                    }
                }).fail(function() {
                    $(element).find('button:submit').removeClass('btn-loading');
                    if( formId == 'section-payment-method' ){
                                    $('#section-pay-later-method').addClass('hidden');
                                        paylayterLoadingTrigger(false)
                            }
                    if(formId == 'form_update_location_customer_shipping' ||  formId == 'form_update_shipping_method' || formId=='section-shipping-rate' || formId=='section-payment-method'){
                        if($('.order-checkout__loading--box').length > 0) {
                            $('.order-checkout__loading--box').removeClass('show');
                            
                        }
                    }
                });

                return false;
            };

            function getRepayment(e){
                let element,formData;
                        if(typeof(e) == 'string') {
                        element = $(e);
                } else {
                        element = this;
                    e.preventDefault();
                }
                const findPaymentMethodId = $('body').find('input:radio[name$="payment_method_id"]:checked').attr('type-id');

                const isReePay=findPaymentMethodId == 41 || findPaymentMethodId == 43

                var formId = $(element).attr('id'), replaceElement = [], funcCallback;
                    if(formId == undefined || formId == null || formId == '') return;
                                if(isReePay){
                                                if(findPaymentMethodId == 41){
                                                $('#section-pay-later-method-kredivo').addClass('hidden');
                                                $('#section-pay-later-method').removeClass('hidden');
                                                }
                                                if(findPaymentMethodId == 43){
                                                $('#section-pay-later-method').addClass('hidden');
                                                $('#section-pay-later-method-kredivo').removeClass('hidden');
                                                }
                                                paylayterLoadingTrigger()
                                                }
                            replaceElement.push('.content-box');
                            replaceElement.push('#section-pay-later-method');
                            replaceElement.push('#section-pay-later-method-kredivo')

                            let paymentMethodId=$('body').find('input:radio[name$="payment_method_id"]:checked').val()
                        if(formId == 'section-payment-method' ){
                                        $.ajax({
                                            type: 'GET',
                                            url: window.location.origin + window.location.pathname + '?' + 'payment_method_id=' +	paymentMethodId + '&preview=true',
                                            success: function(html) {
                                                            for (var i = 0; i < replaceElement.length; i++) 
                                                    {
                                                        let tempElement = replaceElement[i];
                                                        let newElement = $(html).find(tempElement);
                                                        if(newElement.length > 0) {
                                                                
                                                            let listTempElement = $(tempElement);
                                                            for(var j = 0; j < newElement.length; j++)
                                                                if(j < listTempElement.length)
                                                                {
                                                                    $(listTempElement[j]).html($(newElement[j]).html());
                                                                }
                                                        }
                                                    }
                                                                    if(isReePay) {
                                                                        if(findPaymentMethodId==41){
                                                                            $('#section-pay-later-method').removeClass('hidden');
                                                                                }
                                                                        if(findPaymentMethodId == 43){
                                                                            $('#section-pay-later-method-kredivo').removeClass('hidden');
                                                                                    }
                                                                    };
                                                                    paylayterLoadingTrigger(false)
                                                                }
                                        }).fail(function() {
                                                                $('#section-pay-later-method').addClass('hidden');
                                                                $('#section-pay-later-method-kredivo').addClass('hidden');
                                                                $('.checkout-payment__loading--box').removeClass('show');
                                                                $('.payment-later-table--loading').removeClass('show');
                                        })
                                    }
                                    return false;
            }
            function funcSetEvent() {
                
                var effectControlFieldClass = '.field input, .field select, .field textarea';
                $('body')
                    .on('focus', effectControlFieldClass, function() {
                        funcFieldFocus($(this), true);
                    })
                    .on('blur', effectControlFieldClass, function() {
                        funcFieldFocus($(this), false);
                        funcFieldHasValue($(this), true);
                        var idDOM = $(this).attr('id');
                        
                        
                    })
                    .on('keyup input paste', effectControlFieldClass, function() {
                        funcFieldHasValue($(this), false);
                    })
                    .on('submit', 'form', funcFormOnSubmit);

                

                
                        
                    
                        
                            //$("#div_location_country_not_vietnam").hide();
                            $("#is_vietnam").val("true");
                            $("#div_location_country_not_vietnam").hide();
                        
                        
                    
                    
                    
                        $('body')
                            .on('change', '#form_update_location_customer_shipping', function(e) {
                                if ( e.target.id === 'billing_address_address1' ) return;
                                $(this).submit();
                            })
                            ;
                    
                            
                    $('body')
                        
                            .on('change', '#form_update_location_customer_shipping select[name=customer_shipping_country]', function() {
                                
                            var currentCountry = $(this).val();
                                if(currentCountry && currentCountry != "null" && currentCountry != 241)
                                {
                                    $("#is_vietnam").val("false");
                                    $("#div_location_country_not_vietnam").show();
                                }
                                else
                                {
                                    $("#is_vietnam").val("true");
                                    $("#div_location_country_not_vietnam").hide();
                                }
                            })
                        
                        .on('change', '#form_update_location_customer_shipping select[name=customer_shipping_country]', function() {
                                
                            var country_selected =$('body').find( 'input[name=selected_customer_shipping_country]' );
                                if(country_selected && country_selected.length > 0)
                                {
                                    $(country_selected).val($(this).val());
                                    
                                    var province_selected =$('body').find( '#form_update_location_customer_shipping select[name=customer_shipping_province]' );
                                    if(province_selected && province_selected.length > 0)
                                    {
                                        province_selected.val("null");
                                    }
                                    var district_selected =$('body').find( '#form_update_location_customer_shipping select[name=customer_shipping_district]' );
                                    if(district_selected && district_selected.length > 0)
                                    {
                                        district_selected.val("null");
                                    }

                                    var ward_selected =$('body').find( '#form_update_location_customer_shipping select[name=customer_shipping_ward]' );
                                    if(ward_selected && ward_selected.length > 0)
                                    {
                                        ward_selected.val("null");
                                    }

                                    var province = $('.section-customer-information input:hidden[name=customer_shipping_province]');
                                    if(province)
                                    {
                                        province.val("null");
                                    }

                                    var district = $('.section-customer-information input:hidden[name=customer_shipping_district]');
                                    if(district)
                                    {
                                        district.val("null");
                                    }
                                    var ward = $('.section-customer-information input:hidden[name=customer_shipping_ward]');
                                    if(ward)
                                    {
                                        ward.val("null");
                                    }
                                }

                            $('.section-customer-information input:hidden[name=customer_shipping_coutry]').val($(this).val());
                        })
                        .on('change', '#form_update_location_customer_shipping select[name=customer_shipping_province]', function() {
                            
                                var province_selected =$('body').find( 'input[name=selected_customer_shipping_province]' );
                                if(province_selected && province_selected.length > 0)
                                {
                                    $(province_selected).val($(this).val());
                                    var district_selected =$('body').find( '#form_update_location_customer_shipping select[name=customer_shipping_district]' );
                                    if(district_selected && district_selected.length > 0)
                                    {
                                        district_selected.val("null");
                                    }

                                    var ward_selected =$('body').find( '#form_update_location_customer_shipping select[name=customer_shipping_ward]' );
                                    if(ward_selected && ward_selected.length > 0)
                                    {
                                        ward_selected.val("null");
                                    }

                                    var district = $('.section-customer-information input:hidden[name=customer_shipping_district]');
                                    if(district)
                                    {
                                        district.val("null");
                                    }
                                    var ward = $('.section-customer-information input:hidden[name=customer_shipping_ward]');
                                    if(ward)
                                    {
                                        ward.val("null");
                                    }
                                }
                            $('.section-customer-information input:hidden[name=customer_shipping_province]').val($(this).val());
                        })
                        .on('change', '#form_update_location_customer_shipping select[name=customer_shipping_district]', function() {
                            
                                var district_selected =$('body').find( 'input[name=selected_customer_shipping_district]' );
                                if(district_selected && district_selected.length > 0)
                                {	
                                        $(district_selected).val($(this).val());
                                        
                                    var ward_selected =$('body').find( '#form_update_location_customer_shipping select[name=customer_shipping_ward]' );
                                    if(ward_selected && ward_selected.length > 0)
                                    {
                                        ward_selected.val("null");
                                    }
                                    var ward = $('.section-customer-information input:hidden[name=customer_shipping_ward]');
                                    if(ward)
                                    {
                                        ward.val("null");
                                    }
                                }
                            $('.section-customer-information input:hidden[name=customer_shipping_district]').val($(this).val());
                        })
                        .on('change', '#form_update_location_customer_shipping select[name=customer_shipping_ward]', function() {
                            
                                
                            var ward_selected =$('body').find( 'input[name=selected_customer_shipping_ward]' );
                                if(ward_selected && ward_selected.length > 0)
                                {
                                    $(ward_selected).val($(this).val());
                                }

                            $('.section-customer-information input:hidden[name=customer_shipping_ward]').val($(this).val());
                        });

                        
                        
                    $('body')
                        .on('change', '#form_update_shipping_method input:radio', function(e) {
                            $('#form_update_shipping_method .content-box-row.content-box-row-secondary').addClass('hidden');
                            
                            var id = $(this).attr('id');

                            if(id) {
                                var sub = $('body').find('.content-box-row.content-box-row-secondary[for=' + id + ']')
                                    
                                if(sub && sub.length > 0) {
                                    $(sub).removeClass('hidden');
                                }
                            }
                        });

                
                

            
                
            };
            function funcFieldFocus(fieldInputElement, isFocus) {
                
                if(fieldInputElement == undefined)
                    return;
        
                var fieldElement = $(fieldInputElement).closest('.field');

                if(fieldElement == undefined)
                    return;

                if(isFocus) 
                    $(fieldElement).addClass('field-active');
                else 
                    $(fieldElement).removeClass('field-active');
            };
            function funcFieldHasValue(fieldInputElement, isCheckRemove) {
                
                if(fieldInputElement == undefined)
                    return;
        
                var fieldElement = $(fieldInputElement).closest('.field');
                    
                if(fieldElement == undefined)
                    return;
                        
                if($(fieldElement).find('.field-input-wrapper-select').length > 0) {
                    var value = $(fieldInputElement).find(':selected').val();

                    if(value == 'null')
                        value = undefined;
                        
                    if( $(fieldInputElement)[0].id == 'customer_shipping_country')
                    {
                        var country_selected =$('body').find( 'input[name=selected_customer_shipping_country]' );
                                if(country_selected && country_selected.length > 0)
                                {
                                    $(country_selected).val(value);
                                }
                    }
                        
                    if( $(fieldInputElement)[0].id == 'customer_shipping_province')
                    {
                        var province_selected =$('body').find( 'input[name=selected_customer_shipping_province]' );
                                if(province_selected && province_selected.length > 0)
                                {
                                    $(province_selected).val(value);
                                }
                    }
                        
                    if( $(fieldInputElement)[0].id == 'customer_shipping_district')
                    {
                        var district_selected =$('body').find( 'input[name=selected_customer_shipping_district]' );
                                if(district_selected && district_selected.length > 0)
                                {
                                    $(district_selected).val(value);
                                }
                    }
                    if( $(fieldInputElement)[0].id == 'customer_shipping_ward')
                    {
                        var ward_selected =$('body').find( 'input[name=selected_customer_shipping_ward]' );
                                if(ward_selected && ward_selected.length > 0)
                                {
                                    $(ward_selected).val(value);
                                }
                    }

                } else {
                    var value = $(fieldInputElement).val();
                }

                if(!isCheckRemove) {
                    if(value != $(fieldInputElement).attr('value'))
                        $(fieldElement).removeClass('field-error');
                }

                var fieldInputBtnWrapperElement = $(fieldInputElement).closest('.field-input-btn-wrapper');

                if(value && value.trim() != '') {
                    $(fieldElement).addClass('field-show-floating-label');
                    $(fieldInputBtnWrapperElement).find('button:submit').removeClass('btn-disabled');
                } 
                else if(isCheckRemove) {
                    $(fieldElement).removeClass('field-show-floating-label');
                    $(fieldInputBtnWrapperElement).find('button:submit').addClass('btn-disabled');
                } 
                else {
                    $(fieldInputBtnWrapperElement).find('button:submit').addClass('btn-disabled');
                }
            };
            function funcInit() {
                
                funcSetEvent();

                
            }

            function funcReplaceMembershipInfo(html, replaceElement)
            {
                
                var tempElement = $(replaceElement);
                var newElement = $(html).find(replaceElement);
                tempElement.html(newElement.html());
            }

            function funcMembershipInfo(){
                
            }
            function funcGetBrowserInfo(){
                    
                    $.ajax({
                        type: 'POST',
                        url: '/browser-info?w=' + $(window).width() + '&h=' + $(window).height(),
                        success: function() {}
                    });

                
            }
            $(document).ready(function() {
                funcInit();
                funcMembershipInfo();
                funcGetBrowserInfo();
            });
            
        </script>
        

        <script type="text/javascript">
            var toggleShowOrderSummary = false;
            $(document).ready(function() {
                var currentUrl = '';
                const findPaymentMethodId = $('body').find('input:radio[name$="payment_method_id"]:checked').attr('type-id');
                const isReePay=findPaymentMethodId == 41 || findPaymentMethodId == 43
                    if(isReePay){
                        
                                    funcFormOnSubmit('#section-payment-method')
                            
                    }
                
                    currentUrl = '/checkouts/e97e81ee32784452b2ca3e9c1f8fb9fa?step=1';
                

                if ($('#reloadValue').val().length == 0)
                {
                    $('#reloadValue').val(currentUrl);
                    $('body').show();
                }
                else
                {
                    window.location = $('#reloadValue').val();
                    $('#reloadValue').val('');
                }

                $('body')
                    .on('click', '.order-summary-toggle', function() {
                        toggleShowOrderSummary = !toggleShowOrderSummary;

                        if(toggleShowOrderSummary) {
                            $('.order-summary-toggle')
                                .removeClass('order-summary-toggle-hide')
                                .addClass('order-summary-toggle-show');

                            $('.sidebar:not(".sidebar-second") .sidebar-content .order-summary')
                                .removeClass('order-summary-is-collapsed')
                                .addClass('order-summary-is-expanded');
                                    
                            $('.sidebar.sidebar-second .sidebar-content .order-summary')
                                .removeClass('order-summary-is-expanded')
                                .addClass('order-summary-is-collapsed');
                        } else {
                            $('.order-summary-toggle')
                                .removeClass('order-summary-toggle-show')
                                .addClass('order-summary-toggle-hide');

                            $('.sidebar:not(".sidebar-second") .sidebar-content .order-summary')
                                .removeClass('order-summary-is-expanded')
                                .addClass('order-summary-is-collapsed');
                                    
                            $('.sidebar.sidebar-second .sidebar-content .order-summary')
                                .removeClass('order-summary-is-collapsed')
                                .addClass('order-summary-is-expanded');
                        }
                    });
            });
        </script>
@endsection
@section('content')
    <div class="banner">
        <div class="wrap">
            <a href="/" class="logo">
                    <h1 class="logo-text">speedx fashion</h1>
            </a>
        </div>
    </div>
    <button class="order-summary-toggle order-summary-toggle-hide">
        <div class="wrap">
            <div class="order-summary-toggle-inner">
                <div class="order-summary-toggle-icon-wrapper">
                    <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-icon"><path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"></path></svg>
                </div>
                <div class="order-summary-toggle-text order-summary-toggle-text-show">
                    <span>Hiển thị thông tin đơn hàng</span>
                    <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown" fill="#000"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                </div>
                <div class="order-summary-toggle-text order-summary-toggle-text-hide">
                    <span>Ẩn thông tin đơn hàng</span>
                    <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown" fill="#000"><path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"></path></svg>
                </div>
                <div class="order-summary-toggle-total-recap" data-checkout-payment-due-target="590000000">
                    <span class="total-recap-final-price">5,900,000₫</span>
                </div>
            </div>
        </div>
    </button>
    <div class="content content-second">
        <div class="wrap">
            <div class="sidebar sidebar-second">
                <div class="sidebar-content">
                    <div class="order-summary">
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-discount" data-order-summary-section="discount">
                                <form id="form_discount_add" accept-charset="UTF-8" method="post">
                                    <input name="utf8" type="hidden" value="✓">
                                        
                                    <div class="fieldset">
                                        <div class="field  ">
                                            <div class="field-input-btn-wrapper">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="discount.code">Mã giảm giá</label>
                                                    <input placeholder="Mã giảm giá" class="field-input" data-discount-field="true" autocomplete="false" autocapitalize="off" spellcheck="false" size="30" type="text" id="discount.code" name="discount.code" value="" />
                                                </div>
                                                <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                                    <span class="btn-content">Sử dụng</span>
                                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="wrap" style="display:flex;flex-direction:row-reverse;">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-product-list" data-order-summary-section="line-items">
                                <table class="product-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="product" data-product-id="1041340280" data-variant-id="1090252016">
                                            <td class="product-image">
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail-wrapper">
                                                        <img class="product-thumbnail-image" alt="ĐẦM HOA GD0742223231231" src="//product.hstatic.net/200000542485/product/212140418p1399dt_7f93cfbebd024511b019760fd1c823a0_master_result_result_2137b5a5ef114c5fbf11fe0e1d2ebab9_small.png" />
                                                    </div>
                                                    <span class="product-thumbnail-quantity" aria-hidden="true">3</span>
                                                </div>
                                            </td>
                                            <td class="product-description">
                                                <span class="product-description-name order-summary-emphasis"></span>
                                                
                                                    <span class="product-description-variant order-summary-small-text">
                                                        Size 3 / Vàng
                                                    </span>
                                                
                                            </td>
                                            <td class="product-quantity visually-hidden">3</td>
                                            <td class="product-price">
                                                <span class="order-summary-emphasis">2,550,000₫</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-summary-section order-summary-section-discount" data-order-summary-section="discount">
                                <form id="form_discount_add" accept-charset="UTF-8" method="post">
                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="fieldset">
                                        <div class="field  ">
                                            <div class="field-input-btn-wrapper">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="discount.code">Mã giảm giá</label>
                                                    <input placeholder="Mã giảm giá" class="field-input" data-discount-field="true" autocomplete="false" autocapitalize="off" spellcheck="false" size="30" type="text" id="discount.code" name="discount.code" value="" />
                                                </div>
                                                <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                                    <span class="btn-content">Sử dụng</span>
                                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="order-summary-section order-summary-section-total-lines payment-lines" data-order-summary-section="payment-lines">
                                <table class="total-line-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="total-line total-line-subtotal">
                                            <td class="total-line-name">Tạm tính</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis" data-checkout-subtotal-price-target="590000000">
                                                    5,900,000₫
                                                </span>
                                            </td>
                                        </tr>
                                        
                                        
                                        <tr class="total-line total-line-shipping">
                                            <td class="total-line-name">Phí vận chuyển</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis" data-checkout-total-shipping-target="0">
                                                    
                                                        —
                                                    
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="total-line-table-footer">
                                        <tr class="total-line">
                                            <td class="total-line-name payment-due-label">
                                                <span class="payment-due-label-total">Tổng cộng</span>
                                            </td>
                                            <td class="total-line-name payment-due">
                                                <span class="payment-due-currency">VND</span>
                                                <span class="payment-due-price" data-checkout-payment-due-target="590000000">
                                                    5,900,000₫
                                                </span>
                                                <span class="checkout_version" display:none data_checkout_version="2">
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">
                    <a href="/" class="logo">
                            <h1 class="logo-text">speedx fashion</h1>   
                    </a>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/cart">Giỏ hàng</a>
                            </li>
                            
                                <li class="breadcrumb-item breadcrumb-item-current">
                                    
                                            Thông tin giao hàng
                                </li>
                                <li class="breadcrumb-item ">
                                            Phương thức thanh toán
                                </li>
                        </ul>
                </div>
                <div class="main-content">
                                    <div id="checkout_order_information_changed_error_message"   class="hidden"  style="margin-bottom:15px"  >
                                    <p class="field-message field-message-error alert alert-danger"><svg x="0px" y="0px" viewBox="0 0 286.054 286.054" style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve"> <g> <path style="fill:#E2574C;" d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027 c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236 c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209 S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972 c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723 c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843 C160.878,195.732,152.878,187.723,143.036,187.723z"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg> 
                                    </p>
                                    </div>
                                    <script>
                                        $("html, body").animate({ scrollTop: 0 }, "slow");
                                    </script>
                        <div class="step">
                            <div class="step-sections " step="1">
                                    <div class="section">
                                        <div class="section-header">
                                            <h2 class="section-title">Thông tin giao hàng</h2>
                                        </div>
                                        <div class="section-content section-customer-information no-mb">
                                                <div class="inventory_location_data">
                                                </div>
                                                <p class="section-content-text">
                                                    Bạn đã có tài khoản?
                                                    <a href="/account/login?urlredirect=%2Fcheckouts%2Fe97e81ee32784452b2ca3e9c1f8fb9fa%3Fstep%3D1">Đăng nhập</a>
                                                </p>
                                            <div class="fieldset">
                                                    <div class="field   ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_full_name">Họ và tên</label>
                                                            <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="billing_address_full_name" name="billing_address[full_name]" value=""  autocomplete="false"/>
                                                        </div>
                                                    </div>
                                                        <div class="field  field-two-thirds  ">
                                                            <div class="field-input-wrapper">
                                                                <label class="field-label" for="checkout_user_email">Email</label>
                                                                <input autocomplete="false" placeholder="Email" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="email" id="checkout_user_email" name="checkout_user[email]" value="" />
                                                            </div>
                                                        </div>
                                                    <div class="field field-required field-third  ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_phone">Số điện thoại</label>
                                                            <input autocomplete="false" placeholder="Số điện thoại" autocapitalize="off" spellcheck="false" class="field-input" size="30" maxlength="15" type="tel" id="billing_address_phone" name="billing_address[phone]" value="" />
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="section-content">
                                            <div class="fieldset">
                                                        <form autocomplete="off" id="form_update_shipping_method" class="field default" accept-charset="UTF-8" method="post">
                                                            <input name="utf8" type="hidden" value="✓">
                                                            <div class="content-box mt0">
                                                                            
                                                                <div id="form_update_location_customer_shipping" class="order-checkout__loading radio-wrapper content-box-row content-box-row-padding content-box-row-secondary " for="customer_pick_at_location_false">
                                                                    <input name="utf8" type="hidden" value="✓">
                                                                    <div class="order-checkout__loading--box">
                                                                    <div class="order-checkout__loading--circle"></div>  
                                                                </div>
                                                                
                                                                        <div class="field   ">
                                                                            <div class="field-input-wrapper">
                                                                                <label class="field-label" for="billing_address_address1">Địa chỉ</label>
                                                                                        </div>
                                                                            
                                                                        </div>
                                                                


                                                                    <div class="field field-show-floating-label  field-half ">
                                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                                            <label class="field-label" for="customer_shipping_province"> Tỉnh / thành  </label>
                                                                        </div>
                                                                    </div>
                                                                            <div class="field field-show-floating-label  field-half ">
                                                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                                                    <label class="field-label" for="customer_shipping_district">Quận / huyện</label>
                                                                                </div>
                                                                            </div>
                                                                    <div id="div_location_country_not_vietnam" class="section-customer-information ">
                                                                        <div class="field field-two-thirds">
                                                                            <div class="field-input-wrapper">
                                                                                <label class="field-label" for="billing_address_city">Thành phố</label>
                                                                                <input placeholder="Thành phố" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="billing_address_city" name="billing_address[city]" value="" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="field field-third">
                                                                            <div class="field-input-wrapper">
                                                                                <label class="field-label" for="billing_address_zip">Mã bưu chính</label>
                                                                                <input placeholder="Mã bưu chính" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="billing_address_zip" name="billing_address[zip]" value="" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                            </div>
                                        </div>
                                        <div id="change_pick_location_or_shipping">
                                        </div>
                                    </div>
                            </div>
                            <div class="step-footer"  id="step-footer-checkout">
                                        <form id="form_next_step" accept-charset="UTF-8" method="post">
                                            <input name="utf8" type="hidden" value="✓">
                                            <button type="submit" class="step-footer-continue-btn btn">
                                                <span class="btn-content">Tiếp tục đến phương thức thanh toán</span>
                                                <i class="btn-spinner icon icon-button-spinner"></i>
                                            </button>
                                        </form>
                                        <a class="step-footer-previous-link" href="/cart">
                                            Giỏ hàng
                                        </a>
                            </div>
                        </div>
                </div>
                <div class="hrv-coupons-popup">
                    <div class="hrv-title-coupons-popup">
                        <p>Chọn giảm giá <span class="count-coupons"></span></p>
                        <div class="hrv-coupons-close-popup">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.1663 2.4785L15.5213 0.833496L8.99968 7.35516L2.47801 0.833496L0.833008 2.4785L7.35468 9.00016L0.833008 15.5218L2.47801 17.1668L8.99968 10.6452L15.5213 17.1668L17.1663 15.5218L10.6447 9.00016L17.1663 2.4785Z" fill="#424242"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="hrv-content-coupons-code">
                        <h3 class="coupon_heading">Mã giảm giá của shop</h3>
                        <div class="hrv-discount-code-web">
                        </div>
                        <div class="hrv-discount-code-external">

                        </div>
                    </div>
                </div>
                <div class="hrv-coupons-popup-site-overlay"></div>
                <div class="main-footer footer-powered-by">Powered by Haravan</div>
            </div>
        </div>
    </div>
    <div class="form-row place-order">
        <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng" data-value="Đặt hàng">
        <input type="hidden" name="product" value="{{Cart::content()}}">
        <input type="hidden" name="total" value="{{Cart::subtotal()}}">
        <input type="hidden" name="qty" value="{{Cart::count()}}">
        <input type="hidden" name="status" value="1">
    </div>
@endsection      
	

