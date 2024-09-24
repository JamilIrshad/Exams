<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="#" rel="stylesheet" />
    <title>Your purchase is complete</title>
    <style type="text/css">
        /* Global Resets */
        body,
        .background_main,
        p,
        table,
        td,
        div {
            font-family: "Lato", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
        }

        p {
            padding-bottom: 2px;
        }

        body {
            background: #fff;
            font-size: 17px;
            line-height: 24px;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%;
        }

        td {
            font-size: 17px;
            line-height: 24px;
            vertical-align: top;
        }

        /* Footer */
        .email_footer td,
        .email_footer p,
        .email_footer span,
        .email_footer a {
            font-size: 15px;
            text-align: center;
            color: #434245;
        }

        .email_footer td {
            padding-top: 20px;
        }

        .preheader {
            display: none;
            mso-hide: all;
        }

        /* Typography */
        h1,
        h2,
        h3,
        h4 {
            color: #434245;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 12px;
        }

        h1 {
            font-size: 30px;
            line-height: 36px;
            font-weight: 900;
            letter-spacing: -0.75px;
            text-align: left;
        }

        p,
        ul,
        ol {
            font-size: 17px;
            line-height: 24px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px;
        }

        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .button_link::after {
            position: absolute;
            content: "";
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border-radius: 4px;
        }

        .button_link:hover::after {
            box-shadow: inset 0 -2px #237c4a;
        }

        .button_link.is_secondary:hover::after {
            box-shadow: none;
        }

        .button_link.plum:hover {
            background-color: #4a154b !important;
            border-color: #4a154b !important;
        }

        .button_link_wrapper.plum:hover {
            background-color: #4a154b !important;
        }

        .button_link.plum:hover::after {
            box-shadow: none;
        }

        .preview_text {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0;
            font-size: 1px;
            line-height: 1px;
        }

        .preview_text a {
            color: #3aa3e3 !important;
            font-weight: bold;
        }

        /* Responsive and Mobile Friendly Styles */
        /* Yahoo Mail has a history of rendering all media query styles with class selectors unless class is used as an attribute */
        @media only screen and (max-width: 600px) {
            table[class="background_main"] .sm_full_width {
                width: 100% !important;
            }

            table[class="background_main"] .sm_90_percent_width {
                width: 90% !important;
                padding: 16px !important;
                text-align: center !important;
                float: none !important;
            }

            table[class="background_main"] .sm_side_padding {
                padding-right: 8px !important;
                padding-left: 8px !important;
                float: none !important;
            }

            table[class="background_main"] .sm_small_top_padding {
                padding-top: 8px !important;
            }

            table[class="background_main"] .sm_top_padding {
                padding-top: 16px !important;
            }

            table[class="background_main"] .sm_auto_width {
                width: auto !important;
            }

            table[class="background_main"] .sm_auto_height {
                height: auto !important;
            }

            table[class="background_main"] .sm_border_box {
                box-sizing: border-box !important;
            }

            table[class="background_main"] .sm_block {
                display: block !important;
            }

            table[class="background_main"] .sm_inline_block {
                display: inline-block !important;
            }

            table[class="background_main"] .sm_table {
                display: table !important;
            }

            table[class="background_main"] .sm_no_side_padding {
                padding-right: 0 !important;
                padding-left: 0 !important;
            }

            table[class="background_main"] .sm_no_border_radius {
                border-radius: 0 !important;
            }

            table[class="background_main"] .sm_no_padding {
                padding-right: 0 !important;
                padding-left: 0 !important;
            }

            table[class="background_main"] .sm_os_icons_height {
                /* this is to make the parent element the same height as the inline-block img inside */
                height: 44px;
            }

            .social_img_bottom_margin {
                /*this class is for social_user_outreach email only*/
                margin-bottom: 20px !important;
            }

            .social_p_bottom_margin {
                /*this class is for social_user_outreach email only*/
                margin-bottom: 40px !important;
            }
        }

        /* More client-specific styles */
        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .email_footer a {
                color: #434245 !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }
        }

        a:hover {
            text-decoration: underline !important;
        }

        pre,
        code {
            --saf-0: rgba(var(--sk_foreground_low, 29, 28, 29), 0.13);
            border: 1px solid var(--saf-0);
            background: rgba(var(--sk_foreground_min, 29, 28, 29), 0.04);
            font-family: "Monaco", "Menlo", "Consolas", "Courier New", monospace !important;
            font-size: 12px;
            line-height: 1.50001;
            font-variant-ligatures: none;
            white-space: pre;
            white-space: pre-wrap;
            word-wrap: break-word;
            word-break: normal;
            -webkit-tab-size: 4;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
        }

        code {
            color: #e01e5a;
            padding: 2px 3px 1px;
            border-radius: 3px;
        }

        pre {
            margin-bottom: 16px;
            padding: 8px;
            border-radius: 4px;
        }

        blockquote {
            position: relative;
            margin-bottom: 16px;
            padding-left: 16px;
            border-left: rgba(var(--sk_foreground_low_solid, 221, 221, 221), 1);
            border-left-width: 4px;
            border-left-style: solid;
        }
    </style>
    <style type="text/css">
        .p-pricing-container__header p {
            margin-bottom: 6px;
            padding-bottom: 0;
        }

        .p-pricing-container {
            background: #f8f8f8;
            border: 1px solid #e8e8e8;
            margin-top: 30px;
            margin-bottom: 43px;
            width: 100%;
        }

        .p-pricing-container__header {
            text-align: center;
            padding-top: 44px;
        }

        .p-pricing-container__header--name {
            font-size: 18px;
        }

        .p-pricing-container__header--row {
            font-size: 15px;
        }

        .p-pricing-container__calculator_wrapper {
            margin: auto;
            width: 100%;
        }

        .p-pricing-container__calculator {
            padding: 26px 42px 62px;
        }

        .p-help__header {
            margin-bottom: 0;
        }
    </style>
    <style type="text/css">
        .lato {
            font-family: lato, Helvetica, Arial, sans-serif;
        }

        .lightgray {
            color: #727274;
        }

        .p-calculator__container {
            border: 1px solid #dfdfdf;
            background-color: #ffffff;
            width: 100%;
        }

        .p-calculator__header {
            background-color: #3f46ad;
            width: 100%;
        }

        .p-calculator__header td {
            width: 100%;
        }

        .p-calculator__title {
            width: 100%;
        }

        .p-calculator__title td {
            font-size: 18px;
            font-weight: 900;
            padding-top: 28px;
        }

        [lang="ko-KR"] .p-calculator__title td {
            font-size: 16px;
        }

        .p-calculator__billing_term {
            width: 100%;
        }

        .p-calculator__billing_term td {
            font-size: 15px;
            padding-bottom: 28px;
        }

        [lang="ko-KR"] .p-calculator__billing_term td {
            font-size: 13px;
        }

        .p-calculator__header .p-calculator__title td,
        .p-calculator__header .p-calculator__billing_term td {
            text-align: center;
        }

        .p-calculator__header--left .p-calculator__title td,
        .p-calculator__header--left .p-calculator__billing_term td {
            text-align: left;
            padding-left: 36px;
        }

        .p-calculator__body {
            width: 100%;
        }

        .p-calculator__body td {
            padding: 16px 24px 0;
        }

        .p-calculator__row--total td,
        .p-calculator__row--total td * {
            font-size: 18px;
            font-weight: 900;
        }

        [lang="ko-KR"] .p-calculator__row--total td,
        [lang="ko-KR"] .p-calculator__row--total td * {
            font-size: 16px;
        }

        /* Use default font size like the rest of the rows if displaying remaining credits */
        .p-calculator__row--total-small td,
        .p-calculator__row--total-small td * {
            font-size: 15px;
        }

        [lang="ko-KR"] .p-calculator__row--total-small td,
        [lang="ko-KR"] .p-calculator__row--total-small td * {
            font-size: 13px;
        }

        .p-calculator__row--credits_remaining {
            background-color: rgb(249, 249, 249);
        }

        .p-calculator__key,
        .p-calculator__value {
            white-space: nowrap;
        }

        .p-calculator__value {
            text-align: right;
        }

        tr.p-calculator__row td {
            padding: 20px 0;
        }

        tr.p-calculator__row--total td {
            padding: 28px 0;
        }

        tr.p-calculator__row td {
            border-top: 1px dashed #dfdfdf;
        }

        tr.p-calculator__row p,
        tr.p-calculator__row--total p {
            padding-top: 0;
        }

        tr.p-calculator__row--total td,
        tr.p-calculator__row--credits_remaining td {
            border-top: 1px solid #dfdfdf;
        }

        tr.p-calculator__row--credits_remaining td {
            padding: 28px 36px;
        }

        table.p-calculator__table {
            border-collapse: collapse;
            width: 100%;
        }

        table.p-calculator__table p {
            margin-bottom: 0;
        }

        /* Remove dotted top border from first calculator row item */
        tr.p-calculator__row--subtotal td {
            border-top: 0;
        }

        table.p-calculator__table:first-child tr:first-child td {
            border-top: none;
        }

        table.p-calculator__table .p-calculator__row * {
            font-size: 15px;
        }

        [lang="ko-KR"] table.p-calculator__table .p-calculator__row * {
            font-size: 13px;
        }

        /* There is an issue with how DOMPDF handles
vertical-align property on tables so it must be set
explicitly for each child table element*/
        table td,
        table td * {
            vertical-align: top;
            margin-top: 0;
        }
    </style>
</head>

<body>
    <!--[if mso
        ]><style type="text/css">
          .background_main,
          table,
          table td,
          p,
          div,
          h1,
          h2,
          h3,
          h4,
          h5,
          h6 {
            font-family: Arial, sans-serif !important;
          }
        </style><!
      [endif]-->
    <table style="
          background-color: #ffffff;
          padding-top: 20px;
          color: #434245;
          width: 100%;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
          border: 0;
          text-align: center;
          border-collapse: collapse;
        " class="background_main">
        <tr>
            <td style="vertical-align: top; padding: 0">
                <center>
                    <table id="body" class="card" style="
                  border: 0;
                  border-collapse: collapse;
                  margin: 0 auto;
                  background: white;
                  border-radius: 8px;
                  margin-bottom: 16px;
                ">
                        <tr>

                            <td style="width: 546px; vertical-align: top; padding-top: 32px">
                                <div style="max-width: 600px; margin: 0 auto">
                                    <img width="120" style="
                          margin-top: 0;
                          margin-right: 0;
                          margin-bottom: 32px;
                          margin-left: 0px;
                          padding-right: 30px;
                          padding-left: 30px;
                        " src="{{ $message->embed(public_path() . '/images/logo.png') }}" alt="logo image" />
                                    <table>
                                        <tr>
                                            <td style="padding-right: 30px; padding-left: 30px">
                                                <h1 style="
                                font-weight: bold;
                                margin: 0 0 21px;
                                line-height: 30px;
                                font-size: 30px;
                              ">
                                                    Your purchase is complete
                                                </h1>
                                                <p>
                                                    Thanks for using Exams! Your order and payment
                                                    info is below:
                                                </p>
                                                <table class="p-pricing-container">
                                                    <tr>
                                                        <td>
                                                            <div class="p-pricing-container__header">
                                                                <p class="p-pricing-container__header--name">
                                                                    <strong>Purchase Details</strong>
                                                                </p>
                                                                <p class="p-pricing-container__header--row">

                                                                    {{date("d/m/Y")}}

                                                                </p>
                                                                <p class="p-pricing-container__header--row">
                                                                    Order number:
                                                                    <a href="www.exams.test/purchased" style="
                                          font-weight: bold;
                                          color: #1264a3;
                                          text-decoration: none;
                                        ">{{$orderId}}</a>
                                                                </p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table class="p-pricing-container__calculator_wrapper">
                                                                <tr>
                                                                    <td class="p-pricing-container__calculator">
                                                                        <table class="p-calculator__container">
                                                                            <tr>
                                                                                <td>
                                                                                    <table class="p-calculator__header">
                                                                                        <tr class="p-calculator__title">
                                                                                            <td style="color: #ffffff">
                                                                                                {{$exam->name}}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            class="p-calculator__billing_term">
                                                                                            <td style="color: #c5c7e6">
                                                                                                {{$exam->category->name}}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table class="p-calculator__body">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <table
                                                                                                    class="p-calculator__table">
                                                                                                    <tr
                                                                                                        class="p-calculator__row p-calculator__row--subtotal">
                                                                                                        <td
                                                                                                            class="p-calculator__key">
                                                                                                            <span>Product
                                                                                                                price</span><span
                                                                                                                class="lato">
                                                                                                                ×

                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="p-calculator__value">
                                                                                                            {{$exam->price}}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr
                                                                                                        class="p-calculator__row">
                                                                                                        <td
                                                                                                            class="p-calculator__key">
                                                                                                            <span>Tax</span>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="p-calculator__value">
                                                                                                            <span>-</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr
                                                                                                        class="p-calculator__row--total">
                                                                                                        <td
                                                                                                            class="p-calculator__key">
                                                                                                            Paid
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="p-calculator__value">
                                                                                                            <span>{{$exam->price}}</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <p class="p-help__header">
                                                    <strong>Questions about your bill?</strong>
                                                </p>
                                                <p>
                                                    Visit the
                                                    <a href="#" style="
                                  font-weight: bold;
                                  color: #1264a3;
                                  text-decoration: none;
                                ">Exams Help Center</a>
                                                    for all the nitty-gritty details on how billing
                                                    works. And you're always welcome to
                                                    <a href="mailto:help@exams-crud.com" style="
                                  font-weight: bold;
                                  color: #1264a3;
                                  text-decoration: none;
                                ">drop us a line</a>.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
        <tr>
            <td class="email_footer" style="
              font-size: 15px;
              color: #717274;
              text-align: center;
              width: 100%;
              border-top: 1px solid #e1e1e4;
            ">
                <table style="
                margin: 20px auto 0;
                background-color: white;
                border: 0;
                text-align: center;
                border-collapse: collapse;
              ">
                    <tr>
                        <td> </td>
                        <td>
                            <span style="display: block; color: #434245; font-size: 15px">
                                Made by
                                <a href="#" style="text-decoration: none; color: #434245">Exams Technologies, Inc</a>
                                <br />
                                500 Howard
                                Street&nbsp;|&nbsp;San&nbsp;Francisco,&nbsp;CA&nbsp;94105&nbsp;|&nbsp;United
                                States
                            </span>
                        </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td style="
                    font-size: 15px;
                    padding: 16px 8px 24px;
                    vertical-align: top;
                    text-align: center;
                  ">
                            <span><a href="#" style="
                        color: #434245;
                        text-decoration: underline !important;
                      "></a>
                                      
                                <a href="#/legal" style="
                        color: #434245;
                        text-decoration: underline !important;
                      "></a></span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
</p>