
<?php
use App\Models\User;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM product wher status!=0 and id=1 order by created_at desc

$list = user::where('status','!=',0)->orderBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
<form action ="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả thành viên</h1>
                     <a href="index.php?option=user&cat=create" class="btn btn-sm btn-primary">Thêm thành viên</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <   <div class="card-header">
                     <select name="" id="" class="form-control d-inline" style="width:100px;">
                        <option value="">Xoá</option>
                     </select>
                     <button class="btn btn-sm btn-success" type ="submit" name = "THEM">
                  </div>
               <div class="card-body">
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Họ tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(count($list) > 0) : ?>
                        <?php foreach($list as $item   ):?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <img src="../public/images/brand/<?=$item->image;?>" alt="<?=$item->image;?>">
                           </td>
                           <td>
                              <div class="name">
                              <?= $item->name ; ?>                                  
                              </div>
                              <div class="function_style">
                                 <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=user&cat=status&id=<?=$item->id; ?>" class="btn 
                                       btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i> Hiện
                                       </a>
                                       <?php else : ?>
                                       <a href="index.php?option=user&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i> Ẩn
                                       </a>
                                       <?php endif; ?>
                                       <a href="index.php?option=user&cat=edit&id=<?=$item->id; ?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa
                                       <a href="index.php?option=user&cat=show&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết
                                       </a>
                                       <a href="index.php?option=user&cat=delete&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá
                                       </a>
                                 </div>
                           </td>
                           <td><?= $item->phone ; ?> </td>
                           <td><?= $item->email ; ?> </td>                         
                        </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>