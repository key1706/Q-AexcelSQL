<?php
function stripUnicode($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ',
        'D'=>'Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach($unicode as $khongdau=>$codau) {
        $arr=explode("|",$codau);
        $str = str_replace($arr,$khongdau,$str);
    }
    return $str;
}
function changeTitle($str){
    $str=trim($str);
    if ($str=="") return "";
    $str =str_replace('"','',$str);
    $str =str_replace("'",'',$str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
    $str = str_replace(' ','-',$str);
    return $str;
}

function Reader()
{
    require_once("lib/PHPExcel.php");
//Đường dẫn file
    $file = 'data/fileexcel/product.xlsx';
//Tiến hành xác thực file
    $objFile = PHPExcel_IOFactory::identify($file);
    $objData = PHPExcel_IOFactory::createReader($objFile);

//Chỉ đọc dữ liệu
    $objData->setReadDataOnly(true);

// Load dữ liệu sang dạng đối tượng
    $objPHPExcel = $objData->load($file);

//Lấy ra số trang sử dụng phương thức getSheetCount();
// Lấy Ra tên trang sử dụng getSheetNames();

//Chọn trang cần truy xuất
    $sheet  = $objPHPExcel->setActiveSheetIndex(0);

//Lấy ra số dòng cuối cùng
    $Totalrow = $sheet->getHighestRow();
//Lấy ra tên cột cuối cùng
    $LastColumn = $sheet->getHighestColumn();

//Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
    $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

//Tạo mảng chứa dữ liệu
    $data = [];

//Tiến hành lặp qua từng ô dữ liệu
//----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
    for ($i = 2; $i <= $Totalrow; $i++)
    {
        //----Lặp cột
        for ($j = 0; $j < $TotalCol; $j++)
        {
            // Tiến hành lấy giá trị của từng ô đổ vào mảng
            $data[$i-2][$j]=$sheet->getCellByColumnAndRow($j, $i)->getValue();;
        }
    }
    return $data;
}
//chức năng tìm kiếm
function Search($data, $key_work){
    //Chuyển đổi từ khóa tìm kiếm  thành chữ thường
    $Key_workLower = strtolower($key_work);
    //Mảng tạm để chứa giá trị
    $tmp = [];
    for ($row = 0; $row <= count($data); $row++){
        $str = strtolower($data[$row][5]);
        $pos = strpos(changeTitle($str), changeTitle($Key_workLower)); //changetitle là hàm để bỏ tiếng việt từ có dâu thành không dấu
        //nếu là true thì sẽ lưu giá trị tìm thấy vào biến tạm
        if($pos !== false){
            for ($i=0;$i<=$row;$i++){
                $tmp[$i]=$str;
            }
        }
    }
    //kiểm tra nếu mảng tạm không rỗng thì sẽ return $tmp ngược lại và false
    if (!empty($tmp)){
        return $tmp;
    }else{
        return false;
    }
}

?>