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
            background-image: url('{{ public_path('images/background/pdf.png') }}');
            background-position: center center;
            /* Centers the image */
            background-repeat: no-repeat;
            /* Prevents tiling */

            /* Adjust the size of the background image */
            background-size: 100% auto;
            /* 50% width, auto height */
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
        }

        .subtitle {
            font-size: 34px;
            font-weight: bold;
            font-style: italic;
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

        .signature-wrapper {
            position: relative;
            width: 100%;
            height: 40px;
            margin-bottom: 0;
        }

        .signature-line {
            position: relative;
            z-index: 1;
        }

        .signature-image {
            position: absolute;
            z-index: 2;
            max-width: 150px;
            height: auto;
        }

        .signature-kristina {
            bottom: 0;
            left: 50px;
        }

        .signature-celina {
            bottom: 0;
            right: 50px;
        }

        .signature-roseller {
            bottom: -20;
            left: 50%;
            transform: translateX(-70%);
        }

        .signature-celina {
            bottom: -30;
            left: 50%;
            transform: translateX(-30%);
        }

        .signature-ross {
            bottom: -30;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>

<body>
    <table style="width: 98%; text-align: center; border-collapse: collapse; margin-left: 0px; ">
        <tr>
            <td style="width: 30%;">
                @if ($certificateImage->left_logo)
                    <img src="{{ public_path('storage/' . $certificateImage->left_logo) }}" alt="Logo" width="90px"
                        height="auto" />
                @endif
            </td>
            <td style="width: 60%;">
                <div style="color: #5b56ab">Republic of the Philippines</div>
                <div style="color: #5b56ab">Province of Laguna</div>
                <div style="color: #5b56ab">City Government of Calamba</div>
                <div class="title" style="margin-top: 10px">Calamba City Youth Development Office</div>
            </td>
            <td style="width: 30%;">
                @if ($certificateImage->right_logo)
                    <img src="{{ public_path('storage/' . $certificateImage->right_logo) }}" alt="Logo"
                        width="90px" height="auto" />
                @endif

            </td>
        </tr>
    </table>

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
        <div class="subtitle"><u>{{ $certificate->user->name }}</u></div>
        <div class="text" style="text-align: center;font-size: 17px;">Calamba City, Laguna</div>
        <div class="text" style="text-align: center;font-size: 30px;">As a <span>Youth Organization</span></div>
        <div class="text" style="text-align: center;font-size: 23px;">with LYORP registration No. <u><b>
                    {{ $certificate->register_number }}</b></u> </div>

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
                be affixed at Calamba City, Laguna,
                {{ \Carbon\Carbon::parse($certificate->created_at)->format('\t\h\i\s jS \d\a\y \o\f F') }},
                {{ ucfirst(\NumberFormatter::create('en', \NumberFormatter::SPELLOUT)->format(\Carbon\Carbon::parse($certificate->created_at)->year)) }}.
            </p>

        </div>
    </div>
</body>

</html>
