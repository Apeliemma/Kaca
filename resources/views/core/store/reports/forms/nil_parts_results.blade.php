<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
    <title></title>
    <meta name="generator" content="https://conversiontools.io" />
    <meta name="author" content="User"/>
    <meta name="created" content="2020-10-07T19:00:18"/>
    <meta name="changedby" content="User"/>
    <meta name="changed" content="2020-10-07T19:16:34"/>
    <meta name="AppVersion" content="14.0300"/>
    <meta name="Company" content="Hewlett-Packard"/>
    <meta name="DocSecurity" content="0"/>
    <meta name="HyperlinksChanged" content="false"/>
    <meta name="LinksUpToDate" content="false"/>
    <meta name="ScaleCrop" content="false"/>
    <meta name="ShareDoc" content="false"/>

    <style type="text/css">
        body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:x-small }
        a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  }
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  }
        comment { display:none;  }
    </style>

</head>

<body>
<table cellspacing="0" border="0">
    <colgroup width="135"></colgroup>
    <colgroup width="86"></colgroup>
    <colgroup width="205"></colgroup>
    <colgroup width="267"></colgroup>
    <colgroup width="5"></colgroup>
    <colgroup width="85"></colgroup>
    <colgroup width="133"></colgroup>
    <colgroup width="205"></colgroup>
    <colgroup width="164"></colgroup>

{{--    <tr>--}}
{{--        <td height="20" align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--        <td align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--        <td align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--        <td align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--        <td align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--        <td align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--        <td align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--        <td align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--        <td align="left" valign=bottom><font color="#000000"><br></font></td>--}}
{{--    </tr>--}}
    <tr>
        <td height="20" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>

    </tr>
    <tr>
        <td height="21" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><b><font size=3 color="#000000">*Nil Stocks</font></b></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>

    </tr>
    <tr>
        <td height="21" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>

    </tr>
    <tr>
        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="22" align="left" valign=bottom><font size=3 color="#000000">Part No</font></td>
        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><font size=3 color="#000000">Serial Number</font></td>
        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><font size=3 color="#000000">Unit of Account</font></td>
        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom><font size=3 color="#000000">Description</font></td>
     </tr>

    @foreach($nilSpareParts as $nilSparePart)
    <tr>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom><font color="#000000">
            {{ $nilSparePart->part_number }}
            </font>
        </td>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom><font color="#000000">
                {{ $nilSparePart->serial_number }}
            </font>
        </td>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom><font color="#000000">
                {{ $nilSparePart->unit_of_account }}
            </font>
        </td>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom><font color="#000000">
                {{ $nilSparePart->description }}
            </font>
        </td>
        @endforeach
    </tr>
</table>
</body>
</html>
