<?php 
session_name('fake_api');
/* set the cache limiter to 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();
/* set the cache expire to 30 minutes */
session_cache_expire(30);
$cache_expire = session_cache_expire();
session_start();
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers,access-control-allow-credentials,upgrade-insecure-requests');
header('Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT,DELETE');

header('Access-Control-Allow-Credentials: true');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?><?php
function randwrd($length=4){
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyz "),0,$length);
}
if(!empty($_REQUEST['debug'])){
    //$_SESSION['cart']=null;
    echo '<pre>';print_r($_SESSION);
}
//$_SESSION['cart'][]=array('id'=>21);
$payload = json_decode(file_get_contents('php://input'), true);
$products[]=array(
    'id'=>'3001'
    ,'title'=>randwrd(15)
    ,'description'=>randwrd(15)
    ,'image'=>'https://via.placeholder.com/150x150'
    ,'price'=>rand(10,100)
    ,'timestamps'=>time()
);

$products[]=array(
    'id'=>'3002'
    ,'title'=>randwrd(15)
    ,'description'=>randwrd(15)
    ,'image'=>'https://via.placeholder.com/150x150'
    ,'price'=>rand(10,100)
    ,'timestamps'=>time()
);

function find_product($product_id,$products){
    foreach($products as $product){
        if($product['id']==$product_id) return $product;
    }
    return false;
}
switch($_REQUEST['route']){
    case (preg_match('/cart.*/', $_REQUEST['route']) ? true : false):
        if(stripos($_REQUEST['route'],'/')!==false AND $_SERVER['REQUEST_METHOD']=='DELETE'){
            $product_id=@end(@explode('/',$_REQUEST['route']));
            unset($_SESSION['cart'][$product_id]);
            echo json_encode(array('status'=>true));
        }elseif(!empty($payload['product_id']) AND is_numeric($payload['product_id'])){
            if( !empty(@$_SESSION['cart'][$payload['product_id']]) ){
                @$_SESSION['cart'][$payload['product_id']]['quantity']++;
            }elseif(!empty($payload['product_id']) AND is_numeric($payload['product_id'])){
                $_SESSION['cart'][$payload['product_id']]=array(
                    'product_id'=>(int)$payload['product_id']
                    ,'quantity'=>1
                    ,'product'=>find_product($payload['product_id'],$products)
                    ,'timestamps'=>time()
                );
            }
            echo json_encode($_SESSION['cart'][$payload['product_id']]);
        }else{
            echo json_encode((array_values((array)@$_SESSION['cart'])));
        }
    break;
    default:
        if(stripos($_REQUEST['route'],'/')!==false){
            $product_id=@end(@explode('/',$_REQUEST['route']));
            echo json_encode(array('status'=>true));
        }else{
            if(!empty($_POST)){
                // we are saving data
            }else{
                // get all products
                print json_encode($products);
            }
        }
}
// print '<pre>';
// print_r($_SESSION['cart']);
// print_r(session_name());
/*
echo '<pre><hr/>';
print_r($_REQUEST);
print '<hr />';
foreach (getallheaders() as $name => $value) {
    echo "$name: $value\n";
}*/