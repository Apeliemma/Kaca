@php
    $entryType = strtoupper(substr($recordOfVoucher->entry_type,0,2));
@endphp
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
    <title> RECEIPT AND ISSUE VOUCHER </title>


    <style type="text/css">
        body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:x-small }
        a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  }
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  }
        comment { display:none;  }
    </style>

</head>

<body>
<table cellspacing="0" border="0">
    <colgroup width="56"></colgroup>
    <colgroup width="79"></colgroup>
    <colgroup width="46"></colgroup>
    <colgroup width="129"></colgroup>
    <colgroup width="64"></colgroup>
    <colgroup width="38"></colgroup>
    <colgroup width="59"></colgroup>
    <colgroup width="55"></colgroup>
    <colgroup span="2" width="64"></colgroup>
    <tr>
        <td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="right" colspan=3 valign=middle><b><font face="Arial" color="#000000">FORCES FORM 7110</font></b></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="7" align="center" valign=middle><b><font face="Arial" size=3 color="#000000"><br></font></b></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" colspan=5 valign=middle><b><font face="Arial" size=3 color="#000000">RECEIPT AND ISSUE VOUCHER</font></b></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="7" align="left" valign=middle><font face="Arial" size=4 color="#000000">                                       </font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" colspan=3 valign=middle><font face="Arial" size=1 color="#000000">
                 @if( $entryType =='RV')
                RV No&hellip; {{ $recordOfVoucher->vnumber }}&hellip;.       DATE&hellip;{{ $recordOfVoucher->created_at->toDateString() }}&hellip;

                  @else
                RV No&hellip;&hellip;&hellip;&hellip;.       DATE&hellip; &hellip;&hellip; &hellip;

                     @endif
                     </font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td height="21" align="left" colspan=5 valign=middle><font face="Arial" size=1 color="#000000">
                 @if($entryType =='IV')
                IV No&hellip;{{ $recordOfVoucher->vnumber }}&hellip;.       DATE&hellip; {{ $recordOfVoucher->created_at->toDateString() }}&hellip;

                    @else
                IV No&hellip;&hellip;&hellip;&hellip;.       DATE&hellip; &hellip;&hellip; &hellip;
                @endif
            </font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="9" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="left" colspan=10 valign=middle><font face="Arial" size=1 color="#000000">      * Type of transaction:  INDENT/RETURN/EXCHANGE/CIV/CRV/External Issue</font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="12" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000;  " colspan=2 height="21" align="center" valign=middle><font face="Arial" size=1 color="#000000">UNIT DATE STAMP</font></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=3 align="left" valign=middle><font face="Arial" size=1 color="#000000">DEPARTMENT/SECTION:

                {{  $entryType =='RV' ? 'THE STORES DEPARTMENT' :  'THE TECHNICAL WING DEPARTMENT' }}
      </font></td><td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000; border-left: 1px solid #000000" colspan=5 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br>PERMANENT LOAN No.</font></td>
    </tr>
    <tr>
        <td  colspan=2 height="20" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-left: 1px solid #000000; " colspan=3 align="left" valign=middle><font face="Arial" size=1 color="#000000">ISSUED BY:
                <?php
                if ($recordOfVoucher->entry_type == 'ivtech')
                    echo 'Store';
                if ($recordOfVoucher->entry_type == 'rvtech')
                    echo 'Tech';
                if ($recordOfVoucher->entry_type == 'iv')
                    echo 'Stores ';
                if ($recordOfVoucher->entry_type == 'rv')
                    echo 'Supplier '.$recordOfVoucher->supplier?->name;

                ?> MD530F</font></td>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000"  colspan=5 align="left" valign=middle><font face="Arial" size=1 color="#000000">ISSUED TO:

                <?php
                if ($recordOfVoucher->entry_type == 'rvstore' || $recordOfVoucher->entry_type == 'rv' || $recordOfVoucher->entry_type == 'rvtech')
                    echo 'Stores ';
                if ($recordOfVoucher->entry_type == 'iv' )
                    echo $recordOfVoucher->supplier->name;
                if ($recordOfVoucher->entry_type == 'ivtech')
                    echo 'Tech';
                ?> <br></font></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000;" colspan=2 height="20" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="left" valign=middle><font face="Arial" size=1 color="#000000">Reason for Transaction and Authority:
                <?php echo 'SVC';?>
            </font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" height="32" align="left" valign=middle><font face="Arial" color="#000000">                      Folio </font></td>
        <td  align="center" valign=middle><font face="Arial" size=1 color="#000000">Reference No.</font></td>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle><font face="Arial" size=1 color="#000000">VOCAB. SECTION</font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=bottom><font face="Arial" size=1 color="#000000"></font></td>
        <td style="border-bottom: 1px solid #000000;  border-right: 1px solid #000000" colspan=2 align="center" valign=middle><font face="Arial" size=1 color="#000000">QUANTITIES</font></td>
        <td align="left" valign=middle><font face="Arial" size=1 color="#000000">To</font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" height="20" align="left" valign=middle><font face="Arial" color="#000000"> No.</font></td>
        <td  align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=bottom><font color="#000000">Unit of Account<br></font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td align="left" valign=middle><font face="Arial" size=1 color="#000000">Follow</font></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000; " align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000">DESCRIPTION</font></td>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Required </font></td>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Issued</font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign=top><font color="#000000"><br></font></td>
    </tr>

    @if(count($recordOfVoucher->stocks) > 0)
        @foreach($recordOfVoucher->stocks as $stock)
            <tr>
                <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" height="25" align="left" valign=middle><b><font face="Arial" color="#000000">
                            {{ $stock->id }}
                            <br></font></b></td>
                <td style="border-bottom: 1px solid #000000; " align="left" valign=middle><b><font face="Arial" color="#000000">
                            <br>{{ $stock->sparePart?->part_number }}</font></b>
                </td>
                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=middle><b><font face="Arial"  color="#000000"><br>

                            {{ $stock->sparePart?->description }}

                            @if($stock->aircraft_id)
                                - A/C Tail No:- {{ $stock->aircraft?->tail_number }}
                                @endif
                         </font></b>
                </td>
                <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b>
                        <font face="Arial" color="#000000"><br>
                                {{ $stock->sparePart?->unit_of_account }}

                        </font></b>
                </td>
                <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font face="Arial" color="#000000"><br>

                            {{ $stock->quantity }}</font></b>
                </td>
                <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" color="#000000"><br>
                        {{ $stock->quantity }}
                    </font>
                </td>
                <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Arial" color="#000000"><br>
{{--                            I have defaulted ToFollow to 0 as we only issue what you asked--}}
                        0
                    </font>
                </td>
            </tr>



                <tr>
                    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" height="25" align="left" valign=middle><b><font face="Arial" color="#000000"><br></font></b></td>
                    <td style="border-bottom: 1px solid #000000; " align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
                    <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial"  color="#000000">

                        @isset($stock->lpo)
                                @if($stock->lpo->type == 'overseas')
                                    Invoice No: {{ $stock->lpo?->number }}<br>
                                    {!! $stock->lpo?->reference !!}<br>

                                @else
                                    {!! $stock->lpo?->reference !!}<br>
                                @endif
                            @else
                                {!! $stock->reference !!}<br>
                            @endisset
                        </font>
                    </td>
                    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font face="Arial" color="#000000"><br></font></b></td>
                    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font face="Arial" color="#000000"><br></font></b></td>
                    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
                    <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
                </tr>







        @endforeach

    @else
    <tr>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" height="25" align="left" valign=middle><b><font face="Arial" color="#000000"><br></font></b></td>
        <td style="border-bottom: 1px solid #000000; " align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial"  color="#000000"></font></td>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font face="Arial" color="#000000"><br></font></b></td>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font face="Arial" color="#000000"><br></font></b></td>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Arial" color="#000000"><br></font></td>
    </tr>
   @endif




    <tr>
        <td style="border-right: 1px solid #000000" colspan=3 height="20" align="left" valign=middle><font face="Arial" size=1 color="#000000">Officer Initiating Transaction</font></td>
        <td style="border-right: 1px solid #000000" align="center" valign=middle><font face="Arial" size=1 color="#000000">QM TECH</font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="center" valign=middle><font face="Arial" size=1 color="#000000">CUSTODIAN /UNIT</font></td>
        <td  colspan=2 align="center" valign=middle><font face="Arial" size=1 color="#000000">QM TECH</font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" colspan=3 height="13" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000;  border-right: 1px solid #000000" colspan=4 align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000; " colspan=2 align="left" valign=top><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" colspan=3 height="25" align="left" valign=middle><font face="Arial" size=1 color="#000000">Signature:</font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Received Items Returned</font></td>
        <td style="  border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000">Received Items Exchanged </font></td>
        <td  colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000">Posted Items in Stock Record</font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" colspan=3 height="9" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td  colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" colspan=3 height="20" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Sign &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000">Sign&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</font></td>
        <td  colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000">Sign &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</font></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="15" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td  colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="33" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Date&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000">Date &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</font></td>
        <td colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000">Date &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" colspan=3 height="21" align="left" valign=middle><font face="Arial" size=1 color="#000000">Date:</font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=top><font color="#000000"><br></font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="left" valign=top><font color="#000000"><br></font></td>
        <td colspan=2 align="left" valign=top><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="25" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Issued Items Indented or </font></td>
        <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle><font face="Arial" size=1 color="#000000">Received Items Indented</font></td>
        <td style="border-top: 1px solid #000000; " colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000">Posted Items in Permanent</font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" colspan=3 height="24" align="left" valign=middle><font face="Arial" size=1 color="#000000">Approving Officer&rsquo;s </font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Issued Items in Exchange</font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td  colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000">Loan Record Sheet and Card</font></td>
    </tr>
    <tr>
        <td style="border-right: 1px solid #000000" colspan=3 height="37" align="left" valign=middle><font face="Arial" size=1 color="#000000">Signature:</font></td>
        <td style="border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Sign&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000">Sign &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</font></td>
        <td  colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000">Sign &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</font></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="13" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td style=" border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td  colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
    </tr>
    <tr>
        <td colspan=3 height="20" align="left" valign=middle><font face="Arial" size=1 color="#000000">Date:     </font></td>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Arial" size=1 color="#000000">Date &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</font></td>
        <td style="border-right: 1px solid #000000" colspan=4 align="left" valign=middle><font face="Arial" size=1 color="#000000">Date &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</font></td>
        <td  colspan=2 align="left" valign=middle><font face="Arial" size=1 color="#000000">Date &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</font></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="21" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000;  border-right: 1px solid #000000" colspan=4 align="left" valign=top><font color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000; " colspan=2 align="left" valign=top><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="26" colspan=15 align="left" valign=middle><font face="Arial" size=1 color="#000000">I certify that Ammunition salvage and fired ammunition components returned are free from explosives</font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="11" align="left" valign=middle><font face="Arial" size=1 color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" colspan=15 align="left" valign=middle><font face="Arial" size=1 color="#000000"><b>No. </b>&hellip;
                @if($entryType =='RV')
                    {{ $recordOfVoucher->user->service_number }}&hellip;&hellip;..    <b> Rank </b>&hellip;&hellip;

                    {{ $recordOfVoucher->user->rank }}.. &hellip;&hellip;&hellip;     <b>Name</b> &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;

                    {{ $recordOfVoucher->user->full_name }}&hellip;&hellip;&hellip;&hellip; &hellip;&hellip;
                    Signature &hellip;&hellip;&hellip;.&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</font>

                @else
                    {{ $recordOfVoucher->technician?->service_number }}&hellip;&hellip;..    <b> Rank </b>&hellip;&hellip;

                    {{ $recordOfVoucher->technician?->rank }}.. &hellip;&hellip;&hellip;     <b>Name</b> &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;

                    {{ $recordOfVoucher->technician?->full_name }}&hellip;&hellip;&hellip;&hellip; &hellip;&hellip;
                    Signature &hellip;&hellip;&hellip;.&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</font>

            @endif
        </td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>
