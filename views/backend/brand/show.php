<?php
use App\Models\Brand;
use App\Libraries\MyClass;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc

$id=$_REQUEST['id'];
$brand=Brand::find($id);
if($brand==null)
{
   Myclass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=brand");
}
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thương hiệu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     
                     <div class="col-md-12 text-right">
                     <a href="index.php?option=brand" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->id;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->name;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->slug;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><img style="width:100px;" src="../public/images/brand/<?=$brand->image;?>" alt="<?$brand->image;?>"></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->id;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->id;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->id;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->id;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->id;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->id;?></td>
                          </tr>
                          <tr>
                           <td>ID</td>
                           <td><?=$brand->id;?></td>
                          </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>