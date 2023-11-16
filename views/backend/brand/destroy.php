<?php 
use App\Models\Brand;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$brand=Brand::find($id);
if($brand==null)
{
    Myclass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'Danger']);
    header("location:index.php?option=brand&cat=trash");
}
$brand->delete();
Myclass::set_flash('message',['msg'=>'Xóa khỏi CSDL thành công','type'=>'success']);
header("location:index.php?option=brand&cat=trash");