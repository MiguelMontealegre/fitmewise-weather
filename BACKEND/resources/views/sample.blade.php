@extends('mail.layout')
@section('title', 'Page Title')
@section('content')
    <table role="presentation" class="main"
           style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;"
           width="100%">
        <!-- START MAIN CONTENT AREA -->
        <tr>
            <td class="wrapper"
                style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;"
                valign="top">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                       style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;"
                       width="100%">
                    <tr>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                Hi there,</p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                Sometimes you just want to send a simple HTML email with a simple design and clear call
                                to action. This is it.
                                <b>{{$passwordReset->token}}</b>
                            </p>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                   class="btn btn-primary"
                                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;"
                                   width="100%">
                                <tbody>
                                <tr>
                                    <td align="left"
                                        style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;"
                                        valign="top">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                               style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                            <tbody>
                                            <tr>
                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #3498db;"
                                                    valign="top" align="center" bgcolor="#3498db">
                                                    <a href="http://htmlemail.io" target="_blank"
                                                       style="border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #3498db; border-color: #3498db; color: #ffffff;">
                                                        Call To Action
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                This is a really simple email template. Its sole purpose is to get the recipient to
                                click the button with no distractions.</p>
                            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                Good luck! Hope it works.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- END MAIN CONTENT AREA -->
    </table>
@endsection