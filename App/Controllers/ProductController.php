<?php
// namespace src\controller;
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CatalogModel;
use App\Models\OrderModel;
class ProductController extends BaseController{
    private $OrderModel;
    private $ProductModel;
    private $CatalogModel ;
 function __construct(){
        $this->ProductModel=new ProductModel;
        $this->CatalogModel = new CatalogModel;
        $this->OrderModel= new OrderModel;
    }
    function index(){
        $url = $_SERVER['REQUEST_URI'];
        $segments = explode('/', rtrim($url, '/'));
        $idcatalog_key = array_search('catagory', $segments);
        $key_search = array_search('search', $segments);
        $idcatalog = 0;
        $kyw = "";
      
        if ($idcatalog_key !== false && isset($segments[$idcatalog_key + 1])) {
            $idcatalog = $segments[$idcatalog_key + 1];
        }
        if ($key_search !== false && isset($segments[$key_search + 1])) {
            $kyw = $segments[$key_search + 1];
        } 
        $this->titlepage = "Danh sách sản phẩm ";
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        $dssp = $this->ProductModel->sanpham_get_all_catalog($kyw, $idcatalog, $limit, $page);
        $tongsosp = $this->ProductModel->sanpham_get_all_cta();
        $hienthisotrang = $this->ProductModel->sanpham_page($tongsosp, $limit);
        $this->data["new_product"] = $dssp;
        $this->data["catalog_list"] = $this->CatalogModel->catalog_get_all();
        $this->data["html_page"] = $hienthisotrang;
        $this->renderView("product", $this->titlepage, $this->data);
     
    }
    

    function detail(){
        preg_match('/\/product\/detail\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
    
         var_dump($_SERVER['REQUEST_URI'], $matches);
    
        if (isset($matches[1])) {
            $Id_Sp = $matches[1];
            $get_sp = $this->ProductModel->sanpham_get_one($Id_Sp);
            if(is_array($get_sp)){
                extract($get_sp);
                $detailrelate = $this->ProductModel->product_lienquanRanDom($get_sp['Id_Dm']);
                $this->titlepage = $Name;
                $this->data['productRelate'] = $detailrelate;
                $this->data["detail"] = $get_sp;
                $this->renderView("productdetail", $this->titlepage, $this->data);
            } else {
                header("location:" . PROURL);
                exit(); 
            }   
        }
    }
    function deleteall(){
        if(count($_SESSION['mygiohang'])>0){
            $_SESSION['mygiohang']=[];
        }
        header("location: ".PROURL);
    }
    
    ////////////////////////////////////// my cart
    function Product_Cart(){
        $this->titlepage = "Trang giỏ hàng";
        if (!isset($_SESSION['user'])) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            header("location:".PROURL."/user/login");
            exit; // Dừng kịch bản để tránh tiếp tục thực hiện các lệnh không cần thiết
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $Id_Sp = $_POST['Id_Sp'];
            $Img = $_POST['Img'];
            $Price = $_POST['Price'];
            $Name = $_POST['Name'];
            if(isset($_POST['SoLuong']) && ($_POST['SoLuong']>0)){
                $SoLuong = $_POST['SoLuong'];
            }else{
                $SoLuong = 1;
            }

            $flag = 0;  
            
            $i=0; // i để định vị mình đang ở cái sản phẩm nào mà check // i có nghĩa là: ở phần tử thứ i mình cập nhật lại cái số lượng
            foreach($_SESSION['mygiohang'] as $item){
                //Ở đây, $item['TenSP'] là tên sản phẩm của mỗi mục trong giỏ hàng, và $TenSP là tên sản phẩm mà người dùng muốn thêm vào giỏ hàng thông qua form gửi dữ liệu. 
                if($item['Name'] == $Name){
                    $SoLuongNew =  intval($SoLuong) + intval($item['SoLuong']);//$SoLuong được sử dụng để đại diện cho số lượng sản phẩm mà người dùng muốn thêm vào giỏ hàng. //$item['soluong']: Đây có thể là số lượng của sản phẩm hiện tại trong giỏ hàng.
                    $_SESSION['mygiohang'][$i]['SoLuong'] = $SoLuongNew;
                    $flag = 1; // và gán lại biến tạm = 1
                    break; // sau khi check xong thì thoát luôn
                }
                $i++;
            }
            if($flag == 0){
                $cart = [
                    "Id_Sp"=>$Id_Sp,
                    "Img"=>$Img,
                    "Price"=>$Price,
                    "Name"=>$Name,
                    "SoLuong"=>$SoLuong
                ];
                $_SESSION['mygiohang'][] = $cart;
            }
            header("location: ".PROURL);
        }

        //View ra trang
        $this->renderView("cart", $this->titlepage, $this->data);
    }

    function Delete_CartId(){
        preg_match('/\/cart\/deleteId\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
        if(isset($matches[1])){
            $id = $matches[1];
            array_splice($_SESSION['mygiohang'],$id,1); //xoa cai mang nao - Cai dinh vi thu may - xoa bao nhieu phan tu
        }else{
            $_SESSION['mygiohang'] = [];
        }
        header("location:".PROURL."/product/cart");
    }

    public function update_soluong(){
        preg_match('/\/cart\/soLuongId\/(\d+)\/(\w+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
        
        if(isset($matches)){
            $Id_Sp = $matches[1];
            $action = $matches[2];

            $cart = isset($_SESSION['mygiohang']) ? $_SESSION['mygiohang'] : [];

            $key = array_search($Id_Sp, array_column($cart, 'Id_Sp'));
            if($key !== false){
                if($action == 'more'){
                    $cart[$key]['SoLuong']++;
                }elseif ($action == 'less' && $cart[$key]['SoLuong'] > 1) {
                    $cart[$key]['SoLuong']--;
                }
                $_SESSION['mygiohang'] = $cart;
            }
        }
        header("location: ".PROURL."/product/cart");
    }
    public function checkout(){
        $this->titlepage = "Trang thanh toán";

            // LẤY DỮ LIỆU TỪ FORM
                // đoạn mã này là xác định liệu người dùng đã đăng nhập hay chưa
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_SESSION['user'])){
                        $id_tk = $_SESSION['user']['id_tk']; //nếu họ đã đăng nhập
                    }else{
                        $id_tk = 0; //nếu họ chưa đăng nhập
                    }
                    
                    $tongtien = $_POST['tongtien'];
                    $hoTen = $_POST['hoTen'];
                   
                    $Phone = $_POST['SoDienThoai'];   
                    $email = $_POST['email'];
                    if(isset($_POST['ghiChu'])){
                        $ghiChu = $_POST['ghiChu']; //dữ liệu được gửi đi -> True
                    }else{
                        $ghiChu = ""; //nếu không có dữ liệu được gửi đi ->False -> rỗng
                    }
                    if(isset($_POST['PhuongThucTT'])){
                        $PhuongThucTT = $_POST['PhuongThucTT']; //dữ liệu được gửi đi -> True
                    }else{
                        $PhuongThucTT = 0; //nếu không có dữ liệu được gửi đi ->False -> rỗng
                    }
            // Tạo đơn hàng và trả về một id đơn hàng
                $Id_Dh = $this->OrderModel->TaoDonHang($id_tk,$PhuongThucTT,$email,$ghiChu,$Phone,$hoTen);
            // LƯU LẠI BẰNG SESSION
                $_SESSION['Id_Dh'] = $Id_Dh;

                if(isset($_SESSION['mygiohang']) && is_array($_SESSION['mygiohang'])){
                    foreach($_SESSION['mygiohang'] as $item){
                        
                        $this->OrderModel->order_soluong($Id_Dh,$item['Id_Sp']);
                        //Thêm nó vào chi tiêt đơn hàng 
                        $this->OrderModel->addOrder($Id_Dh,$item['Id_Sp'],$item['Price'],$item['SoLuong']); //$Id_Dh là để nó biết lấy theo cái mã Id_Dh nào
                    }
                    //nghĩa là sau khi sản phẩm đó được đặt, và quay lại trang chủ thì sản phẩm đó phải biến mất trong giỏ hàng
                }
            
                if($PhuongThucTT == 1 ){
                    //Gửi email
                        // $TieuDe = "Đơn hàng bạn đặt đã thành công";
                        // $NoiDung = "<div><p>Cảm ơn quý khách đã đặt hàng của chúng tôi mã đơn hàng của bạn là: ".$MaDHRandom."</p><div>";
                        // $NoiDung .= "Thông tin đơn đặt hàng bao gồm:";
                        // $tongtien=0; $ThanhTien=0;
                        // foreach($_SESSION['mygiohang'] as $emailcart){
                        //     $ThanhTien = $emailcart['SoLuong'] * $emailcart['Price'];
                        //     $tongtien +=$ThanhTien;
                        //     $NoiDung .= '
                        //             <ul>
                        //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Mã SP:</strong> '.$emailcart['Id_Sp'].'</li>
                        //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Tên SP:</strong> '.$emailcart['TenSP'].'</li>
                        //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Số Lượng:</strong> '.$emailcart['SoLuong'].'</li>
                        //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Giá SP:</strong> '.$emailcart['Price'].'</li>
                        //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Thành Tiền:</strong> '.$ThanhTien.'</li>
                        //             </ul>
                        //         ';
                        // }
                        // $NoiDung .= '
                        //             <hr>
                        //             <ul>
                        //                 <li style="list-style: none;"><strong style="color: red;">Tổng tiền:</strong> '.$tongtien.'</li>
                        //             </ul>';
                                    
                        // $MailDatHang = $_SESSION['email'];
                        // $mail = new Mailer();
                        // $mail->DatHangemail($TieuDe,$NoiDung,$MailDatHang);
                        // //Chuyển đến trang đơn hàng (Hóa đơn)
                        header("location:".PROURL."/order/vieworder");
                        unset($_SESSION['mygiohang']);
                } elseif ($PhuongThucTT == 2) {
                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = PROURL."/order/vieworder";
                    $vnp_TmnCode = "9KKE7C2Q";//Mã website tại VNPAY 
                    $vnp_HashSecret = "BWUHEEXHJGAUKSTBVRWFMQXIFHFEVPAC"; //Chuỗi bí mật

                    $ThanhTien = 0;
                    $tongtien = 0;
                    foreach($_SESSION['mygiohang'] as $item){
                        $ThanhTien = $item['SoLuong'] * $item['Price'];
                        $tongtien += $ThanhTien;
                    }
                    unset($_SESSION['mygiohang']);
                    $vnp_TxnRef = rand(00,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Noi dung thanh toan';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = $tongtien * 100;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    //Add Params of 2.0.1 Version
                    //$vnp_ExpireDate = $_POST['txtexpire'];
                    //Billing
                    // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                    // $vnp_Bill_email = $_POST['txt_billing_email'];
                    // $fullName = trim($_POST['txt_billing_fullname']);
                    // if (isset($fullName) && trim($fullName) != '') {
                    //     $name = explode(' ', $fullName);
                    //     $vnp_Bill_FirstName = array_shift($name);
                    //     $vnp_Bill_LastName = array_pop($name);
                    // }
                    // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
                    // $vnp_Bill_City=$_POST['txt_bill_city'];
                    // $vnp_Bill_Country=$_POST['txt_bill_country'];
                    // $vnp_Bill_State=$_POST['txt_bill_state'];
                    // // Invoice
                    // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
                    // $vnp_Inv_email=$_POST['txt_inv_email'];
                    // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
                    // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
                    // $vnp_Inv_Company=$_POST['txt_inv_company'];
                    // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
                    // $vnp_Inv_Type=$_POST['cbo_inv_type'];
                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef

                        //"vnp_ExpireDate"=>$vnp_ExpireDate
                        // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                        // "vnp_Bill_email"=>$vnp_Bill_email,
                        // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                        // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                        // "vnp_Bill_Address"=>$vnp_Bill_Address,
                        // "vnp_Bill_City"=>$vnp_Bill_City,
                        // "vnp_Bill_Country"=>$vnp_Bill_Country,
                        // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                        // "vnp_Inv_email"=>$vnp_Inv_email,
                        // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                        // "vnp_Inv_Address"=>$vnp_Inv_Address,
                        // "vnp_Inv_Company"=>$vnp_Inv_Company,
                        // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                        // "vnp_Inv_Type"=>$vnp_Inv_Type
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    // }

                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array('code' => '00'
                        , 'message' => 'success'
                        , 'data' => $vnp_Url);
                        if (isset($_POST['redirect'])) {
                            header('Location: ' . $vnp_Url);
                            die();
                        } else {
                            echo json_encode($returnData);
                        }
                    
                } elseif ($PhuongThucTT == 3) {
                    function execPostRequest($url, $data)
                    {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                'Content-Type: application/json',
                                'Content-Length: ' . strlen($data))
                        );
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        //execute post
                        $result = curl_exec($ch);
                        //close connection
                        curl_close($ch);
                        return $result;
                    }

                    $ThanhTien = 0;
                    $tongtien = 0;
                    foreach($_SESSION['mygiohang'] as $item){
                        $ThanhTien = $item['SoLuong'] * $item['Price'];
                        $tongtien += $ThanhTien;
                    }
                        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                        $partnerCode = 'MOMOBKUN20180529';
                        $accessKey = 'klm05TvNBzhg7h7j';
                        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                        $orderInfo = "Thanh toán qua MoMo";
                        $amount = $tongtien;
                        $orderId = rand(00,9999);
                        $redirectUrl = PROURL."/order/vieworder";
                        $ipnUrl = PROURL."/order/vieworder";
                        $extraData = "";
                        
                        
                            $partnerCode = $partnerCode;
                            $accessKey = $accessKey;
                            $serectkey = $secretKey;
                            $orderId = $orderId; // Mã đơn hàng
                            $orderInfo = $orderInfo;
                            $amount = $amount;
                            $ipnUrl = $ipnUrl;
                            $redirectUrl = $redirectUrl;
                            $extraData = $extraData;
                        
                            $requestId = time() . "";
                            $requestType = "payWithATM";
                            //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                            //before sign HMAC SHA256 signature
                            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                            $signature = hash_hmac("sha256", $rawHash, $serectkey);
                            $data = array('partnerCode' => $partnerCode,
                                'partnerName' => "Test",
                                "storeId" => "MomoTestStore",
                                'requestId' => $requestId,
                                'amount' => $amount,
                                'orderId' => $orderId,
                                'orderInfo' => $orderInfo,
                                'redirectUrl' => $redirectUrl,
                                'ipnUrl' => $ipnUrl,
                                'lang' => 'vi',
                                'extraData' => $extraData,
                                'requestType' => $requestType,
                                'signature' => $signature);
                            $result = execPostRequest($endpoint, json_encode($data));
                            $jsonResult = json_decode($result, true);  // decode json
                        
                            //Just a example, please check more in there
                        
                            header('Location: ' . $jsonResult['payUrl']);
                            unset($_SESSION['mygiohang']);
                }
                
                    
                }




    $this->renderView("checkout", $this->titlepage, $this->data);
}

function vieworder(){
     $this->titlepage = "Trang thanh toán";    
     $Id_Dh = $_SESSION['Id_Dh'];
     $viewdonhang= $this->OrderModel->get_order($Id_Dh);
     $viewspdonhang= $this->OrderModel->get_productOrder($Id_Dh);
     $this->data['viewdonhang']=$viewdonhang;
     $this->data['viewspdonhang']=$viewspdonhang;
    $this->renderView("vieworder", $this->titlepage, $this->data);
    
    
}
}
?>