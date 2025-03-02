<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Forces Form 890A</title>
    <!-- bootstrap 4 css CDN -->
    <link rel="stylesheet" href="{{ url('backend/css/app.css') }}">
    <style>
        /* Wraps the whole form */
        .form-wrap{
            padding: 50px;
        }

        /* styles for p in forms */
        .form-wrap p,ul{
            color: #757679;
            text-align:justify;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        /* header level 1 style in forms */
        .h-1{
            /* border-bottom: 2px solid; */
            padding: 17px 0px 3px 2px;
            font-weight: bold;
            font-size: 20px;
            text-transform: uppercase;
            text-align: center;
            /* text-decoration: underline; */
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        /* header level 2 style in forms */
        .h-2{
            padding: 5px 0px;
            font-weight: bold;
            font-size: 18px;
        }
        .heading{
            padding: 7px 0px;
            font-weight: bold;
            font-size: 20px;
            text-transform: uppercase;
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        /* header level 3 style in forms */
        .h-3{
            padding: 4px 0px;
            font-weight: bold;
            font-size: 16px;
        }

        /* Potraits */
        .form-portrait{
            float: left;
            margin: 7px 7px 7px auto;
        }
        hr{
            border-bottom: 2px solid;
        }
        .brackets{
            font-style: italic;
            text-align: center;
        }
        /* th, td {
           padding-top: 10px;
           padding-bottom: 20px;
           padding-left: 30px;
           padding-right: 40px;
         } */
        .log{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 12%;
        }
        #myRotation {
            width: 150px;
            height: 80px;
            background-color:pink;
            transform:rotate(-90deg);
        }
        .tbl{
            text-align: left;
        }
        .image-placeholder {
            background-color: #eee;
            display: flex;
            height: 180px;
            margin: 5px;
            width: 180px;
        }

        .image-placeholder > h4 {
            align-self: center;
            text-align: center;
            width: 100%;
        }

        /* media queries - mobile screeans*/
        @media(max-width:767px){
            .form-wrap{
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<!-- with bootstrap grid system in use -->
<div class="container aos-int aos-animate" data-aos="fade-up">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 h-1">

        </div>
        <div class="col-md-2">
            FORCES FORM 890A
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="4" style="text-align: center;">DELIVER TO ( via R. & I. STORES) <br>
                *{W/S Section No. ........................} <br>
                *{No......{{ $stock->aircraft?->tail_number }}....... Vehicle Workshop Depot} <br>
                <hr> Demand Order No.  Date/ 20......{{ $stock->created_at?->toDateString() }}......</th>

            <th style="text-align: center;" colspan="6">E.M.E STORES DEMAND AND EXPENSE VOUCHER
                <p>* Non-Expendable Items/Expendable Items</p>
                <p>From Workshop or W/S Section..............................................................</p>
                <p>Passed to............................................................ Date................. 20.......</p></th>
            <th colspan="4" style="text-align: center;"><span style="text-align: left !important;">VOUCHER</span> <br> SERIAL No. <br> <hr> <br> <p>Control no            *Normal Special <br> <hr> Receipt no Date /  ....{{ $stock->updated_at?->toDateString() }}  ...</p></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td rowspan="2">Job No.</td>
            <td colspan="2">Part Number</td>
            <td rowspan="2" colspan="2">Description</td>
            <td rowspan="2">K.A <br> No.</td>
            <td rowspan="2">Make and<br> Type</td>
            <td rowspan="2" >Contract, engine <br> or Chassis, etc., <br> No.</td>
            <td colspan="9"><div class="row">
                    <div class="col-md-6">Quantity</div>
                    <div class="col-md-6">Posted</div>
                </div></td>
        </tr>
        <tr>
            <td>Vocab.</td>
            <td>Cat. No.</td>
            <td>Reqd.</td>
            <td>Issued</td>
            <td>To <br>follow</td>
            <td>In  <br> Ledger</td>
            <td>Job <br> Book</td>
            <td>Job <br> Card</td>
        </tr>
        <tr>
            <td></td>
            <td>
                {{ $stock->sparePart?->part_number }}
            </td>
            <td colspan="2"></td>
            <td>
                {{ $stock->sparePart?->description }}
            </td>
            <td></td>
            <td>{{ $stock->aircraft?->model }}</td>

            <td>{{ $stock->aircraft?->engine_model }}</td>
            <td>{{ $stock->quantity }}</td>
            <td>{{ $stock->quantity }}</td>
            <td>0</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="4">
                <p>Approved: <br>Signed.............{{ $stock->maintenanceOfficer?->full_name }}............. O. i/c Workshop <br> * Delete whichever inapplicable</p>
            </td>
            <td colspan="5">
                <p>Received by: <br> Signed...........{{ $stock->receivedBy?->full_name }}............ <br> *Examiner/Charge Hand / N.C.O i/c <br> GPK (L) </p>
            </td>
            <td colspan="5">
                Store QM: <br> Signed...............{{ $stock->issuedBy?->full_name }}................... <br> * Storeman/ O.i/c Workshops
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>


</html>
