<?php 
use App\Models\Brand;
use App\Libraries\MyClass;

$id=$_REQUEST['id'];
$brand=Brand::find($id);
if($brand==null)
{
    Myclass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=brand");
}

$brand->status=0;
$brand->updated_at=date('Y-m-d H:i:s');
$brand->updated_by=(isset($_SESSION['user_id']))?$_SESSION['user_id']:1;
$brand->save();
Myclass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header("location:index.php?option=brand");