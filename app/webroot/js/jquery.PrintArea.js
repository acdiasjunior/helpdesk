
<!-- saved from url=(0057)http://plugins.jquery.com/files/jquery.PrintArea.js_4.txt -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">/**
 *  Version 2.1
 *      -Contributors: "mindinquiring" : filter to exclude any stylesheet other than print.
 *  Tested ONLY in IE 8 and FF 3.6. No official support for other browsers, but will
 *      TRY to accomodate challenges in other browsers.
 *  Example:
 *      Print Button: &lt;div id="print_button"&gt;Print&lt;/div&gt;
 *      Print Area  : &lt;div class="PrintArea"&gt; ... html ... &lt;/div&gt;
 *      Javascript  : &lt;script&gt;
 *                       $("div#print_button").click(function(){
 *                           $("div.PrintArea").printArea( [OPTIONS] );
 *                       });
 *                     &lt;/script&gt;
 *  options are passed as json (json example: {mode: "popup", popClose: false})
 *
 *  {OPTIONS} | [type]    | (default), values      | Explanation
 *  --------- | --------- | ---------------------- | -----------
 *  @mode     | [string]  | ("iframe"),"popup"     | printable window is either iframe or browser popup
 *  @popHt    | [number]  | (500)                  | popup window height
 *  @popWd    | [number]  | (400)                  | popup window width
 *  @popX     | [number]  | (500)                  | popup window screen X position
 *  @popY     | [number]  | (500)                  | popup window screen Y position
 *  @popTitle | [string]  | ('')                   | popup window title element
 *  @popClose | [boolean] | (false),true           | popup window close after printing
 *  @strict   | [boolean] | (undefined),true,false | strict or loose(Transitional) html 4.01 document standard or undefined to not include at all (only for popup option)
 */
(function($) {
    var counter = 0;
    var modes = { iframe : "iframe", popup : "popup" };
    var defaults = { mode     : modes.iframe,
                     popHt    : 500,
                     popWd    : 400,
                     popX     : 200,
                     popY     : 200,
                     popTitle : '',
                     popClose : false };

    var settings = {};//global settings

    $.fn.printArea = function( options )
        {
            $.extend( settings, defaults, options );

            counter++;
            var idPrefix = "printArea_";
            $( "[id^=" + idPrefix + "]" ).remove();
            var ele = getFormData( $(this) );

            settings.id = idPrefix + counter;

            var writeDoc;
            var printWindow;

            switch ( settings.mode )
            {
                case modes.iframe :
                    var f = new Iframe();
                    writeDoc = f.doc;
                    printWindow = f.contentWindow || f;
                    break;
                case modes.popup :
                    printWindow = new Popup();
                    writeDoc = printWindow.doc;
            }

            writeDoc.open();
            writeDoc.write( docType() + "&lt;html&gt;" + getHead() + getBody(ele) + "&lt;/html&gt;" );
            writeDoc.close();

            printWindow.focus();
            printWindow.print();

            if ( settings.mode == modes.popup &amp;&amp; settings.popClose )
                printWindow.close();
        }

    function docType()
    {
        if ( settings.mode == modes.iframe || !settings.strict ) return "";

        var standard = settings.strict == false ? " Trasitional" : "";
        var dtd = settings.strict == false ? "loose" : "strict";

        return '&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01' + standard + '//EN" "http://www.w3.org/TR/html4/' + dtd +  '.dtd"&gt;';
    }

    function getHead()
    {
        var head = "&lt;head&gt;&lt;title&gt;" + settings.popTitle + "&lt;/title&gt;";
        $(document).find("link")
            .filter(function(){
                    return $(this).attr("rel").toLowerCase() == "stylesheet";
                })
            .filter(function(){ // this filter contributed by "mindinquiring"
                    var media = $(this).attr("media");
                    return (media.toLowerCase() == "" || media.toLowerCase() == "print")
                })
            .each(function(){
                    head += '&lt;link type="text/css" rel="stylesheet" href="' + $(this).attr("href") + '" &gt;';
                });
        head += "&lt;/head&gt;";
        return head;
    }

    function getBody( printElement )
    {
        return '&lt;body&gt;&lt;div class="' + $(printElement).attr("class") + '"&gt;' + $(printElement).html() + '&lt;/div&gt;&lt;/body&gt;';
    }

    function getFormData( ele )
    {
        $("input,select,textarea", ele).each(function(){
            // In cases where radio, checkboxes and select elements are selected and deselected, and the print
            // button is pressed between select/deselect, the print screen shows incorrectly selected elements.
            // To ensure that the correct inputs are selected, when eventually printed, we must inspect each dom element
            var type = $(this).attr("type");
            if ( type == "radio" || type == "checkbox" )
            {
                if ( $(this).is(":not(:checked)") ) this.removeAttribute("checked");
                else this.setAttribute( "checked", true );
            }
            else if ( type == "text" )
                this.setAttribute( "value", $(this).val() );
            else if ( type == "select-multiple" || type == "select-one" )
                $(this).find( "option" ).each( function() {
                    if ( $(this).is(":not(:selected)") ) this.removeAttribute("selected");
                    else this.setAttribute( "selected", true );
                });
            else if ( type == "textarea" )
            {
                var v = $(this).attr( "value" );
                if ($.browser.mozilla)
                {
                    if (this.firstChild) this.firstChild.textContent = v;
                    else this.textContent = v;
                }
                else this.innerHTML = v;
            }
        });
        return ele;
    }

    function Iframe()
    {
        var frameId = settings.id;
        var iframeStyle = 'border:0;position:absolute;width:0px;height:0px;left:0px;top:0px;';
        var iframe;

        try
        {
            iframe = document.createElement('iframe');
            document.body.appendChild(iframe);
            $(iframe).attr({ style: iframeStyle, id: frameId, src: "" });
            iframe.doc = null;
            iframe.doc = iframe.contentDocument ? iframe.contentDocument : ( iframe.contentWindow ? iframe.contentWindow.document : iframe.document);
        }
        catch( e ) { throw e + ". iframes may not be supported in this browser."; }

        if ( iframe.doc == null ) throw "Cannot find document.";

        return iframe;
    }

    function Popup()
    {
        var windowAttr = "location=yes,statusbar=no,directories=no,menubar=no,titlebar=no,toolbar=no,dependent=no";
        windowAttr += ",width=" + settings.popWd + ",height=" + settings.popHt;
        windowAttr += ",resizable=yes,screenX=" + settings.popX + ",screenY=" + settings.popY + ",personalbar=no,scrollbars=no";

        var newWin = window.open( "", "_blank",  windowAttr );

        newWin.doc = newWin.document;

        return newWin;
    }
})(jQuery);</pre></body></html>