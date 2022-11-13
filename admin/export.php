<?php
    require_once("../../../scripts/incfiles/config.inc.php");
    require_once("../../../scripts/langfiles/FR.php");
    require_once("../../../modules/otourix/langfiles/FR.php");
    require_once("../../../modules/otourix/library/otourix.inc.php");
    $myOtourix  =   new cwd_otourix();
?>

<?php
    if(isset($_REQUEST['dataExport'])){

    }
    switch($_REQUEST['dataExport']){
        case    'students'      :   header('Content-Type: application/xls');
                                    header('Content-Disposition: attachment; filename=students.xls');
                                    print $myOtourix->export_otourix_members('3');
                                    exit();
        break;
        case    'teachers'      :   header('Content-Type: application/xls');
                                    header('Content-Disposition: attachment; filename=teachers.xls');
                                    print $myOtourix->export_otourix_members('5');
                                    exit();
        break;
        case    'marksheets'    :   $arr_markSheet  =   $myOtourix->get_marksheet_by_id($_REQUEST['msId']);
                                    $msLib          =   $arr_markSheet['ms_LIB'];
                                    //header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    //header("Content-Type: application/vnd.ms-excel; name='excel'");
                                    //header("Cache-Control: max-age=0");
                                    //header("Content-Type: application/xls'");
                                    //header("Content-type: application/octet-stream");
                                    header("Content-Type: application/vnd.ms-excel");
                                    header("Content-Disposition: attachment; filename=\"$msLib.xls\"");
                                    //header("Pragma: no-cache");
                                    //header("Expires: 0");
                                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                                    header('Pragma: public'); // HTTP/1.0

                                    echo $myOtourix->export_mark_sheet($_REQUEST['msId']);
                                    //exit();
                                    ob_clean();
                                    flush();
        break;
        default                 :   print "Nothing to display";
    }
?>