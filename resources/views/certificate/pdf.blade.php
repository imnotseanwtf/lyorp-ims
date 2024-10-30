<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            color: #000;
            margin: 0;
            padding: 20px;

        }

        .container {
            max-width: 900px;
            margin: auto;
            text-align: center;
        }

        .title,
        .subtitle,
        .details,
        .footer {
            margin-bottom: 20px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            font-style: italic;
        }

        .subtitle {
            font-size: 34px;
            font-weight: bold;
        }

        .text {
            font-size: 16px;
        }

        .text-bold {
            font-weight: bold;
        }

        .footer p {
            font-size: 19px;
        }

        .container span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <table style="width: 98%; text-align: center; border-collapse: collapse; margin-left: 0px; ">
        <tr>
            <td style="width: 30%;">
                <img src="{{ public_path('images/logo/logocity.webp') }}" alt="Logo" width="90px" height="auto" />
            </td>
            <td style="width: 60%;">
                <div>Republic of the Philippines</div>
                <div>Province of Laguna</div>
                <div>City Government of Calamba</div>
                <div class="title" style="margin-top: 10px">Calamba City Youth Development Office</div>
            </td>
            <td style="width: 30%;">
                <img src="{{ public_path('images/logo/logo-ym.jpg') }}" alt="Logo" width="90px" height="auto" />
            </td>
        </tr>
    </table>
    <table style="border-top: 5px; margin-top: 10px;">
        <div class="container">

            <div class="text" align="center">
                <p> By virtue of Republic Act 10742 and Calamba City Ordinance 609 series of 2017, upon
                    compliance with the requirements set forth in the Policy Guidelines of the Registration
                    of Youth Organizations and Youth- Serving Organizations, and in pursuant to NYC Non-
                    Policy Resolution No. 10 series of 2018, this
                </p>
            </div>
            <div class="subtitle"><u>Certificate of Registration</u></div>
            <div class="text" style="text-align: center; font-weight: bold;font-size: 23px;">is confered to</div> <br>
            <div class="subtitle"><u>{{ $organizationName }}</u></div>
            <div class="text" style="text-align: center;font-size: 17px;">Calamba City, Laguna</div>
            <div class="text" style="text-align: center;font-size: 30px;">As a <span>Youth Organization</span></div>
            <div class="text" style="text-align: center;font-size: 23px;">with LYORP registration No</div>
            <div class="text" style="text-align: center; text-indent: 15px;">
                <p>
                    as a registered organization, it shall be entitled to additional privileges, and shall be
                    priority beneficiaries of programs, projects, and activities provided by the City
                    Government of Calamba thru the City Youth Development Office and other policies
                    that the city may adopt hereafter.
                </p>
                <p>
                    It shall comply with the laws and orders issued by the duly constituted authorities of the
                    Republic of the Philippines, and to the policies, rules, and regulations issued by the City.
                    It shall also submit annually an accomplishment report and updates on organizational
                    information. In its failure to do so, this Certificate of Registration, which shall be valid for
                    a period of three years from the date of issuance thereof, may be revoked or
                    suspended by the Youth Development Office.

                </p>
                <p>
                    <span>IN WITNESS HEREOF</span>, after the verification of attached documents by the Local Youth
                    Development Officer, I have here unto set my hand and caused the seal of the City to
                    be affixed at Calamba City, Laguna, this 16th day of January, Two Thousand and Twenty Four.
                </p>
            </div>
            <br> <br> <br>
            <table width="660px" height="auto">
                <tr>
                    <td>
                        <div class="container">
                            <span>
                                <p style="margin-right: 0px; margin-bottom:0px; text-align:left;">
                                    ______________________________________</p>
                            </span>
                            <span>
                                <p class="text-bold"
                                    style="margin-left: 8px;margin-top:0px;margin-bottom:0;text-align:left;">MA.
                                    KRISTINA G. LIANGCO, RN, RSW</p>
                            </span>
                            <span>
                                <p class="text"
                                    style="font-style: italic;font-weight:normal; font-size: 15px; margin-left: 50px; margin-top: 0;text-align:left;">
                                    Youth Development Officer III</p>
                            </span>
                    </td>
                    <td>
                        <span>
                            <p style="margin-right: 0px; margin-bottom:0px;text-align:right; ">
                                ____________________________</p>
                        </span>
                        <span>
                            <p class="text-bold"
                                style="margin-right: 6px;margin-top:0px;margin-bottom:0;text-align:right;">CELINA D.
                                MANABAT, RSW</p>
                        </span>
                        <span>
                            <p class="text"
                                style="font-style: italic; font-weight:normal; font-size: 15px; margin-right: 37px; margin-top: 0;text-align:right;">
                                Department Head -CSSD</p>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <span>
                            <p style="margin-right: 0px; margin-bottom:0px;text-align:center; ">
                                ____________________________</p>
                        </span>
                        <span>
                            <p class="text-bold"
                                style="margin-right: 0px;margin-top:0px;margin-bottom:0;text-align:center;">HON.
                                ROSELLER H. RIZAL</p>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </table>
</body>

</html>