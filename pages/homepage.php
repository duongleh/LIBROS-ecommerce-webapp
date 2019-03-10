<?php
require("blocks/slider_home.php")
?>
<!-- Item -->
<?php
$arr = array("NNLTJ","TT","CSDL","W");
$arr_length = count($arr);
for ($i = 0; $i < $arr_length;$i++)
{
?>


<div class="container" style="margin-top:60px">
  <div class="row">
  <div class="col text-center">
  	<?php
		$IDTL = $arr[$i];
		$Ten_IDTL = GetTL($IDTL);
		$row_Ten_IDTL = mysqli_fetch_array($Ten_IDTL);
	  ?>
   <a href="index.php?p=danhmucsach&ID_TheLoai=<?php echo $IDTL?>&page=1">
   	 <h3><?php echo $row_Ten_IDTL['Theloai']?></h3> </a>
   	 </div>
</div>

<div class="container" style="margin-top:30px">
  <div class="row">
   <?php
	$sausachmoi = SachMoiNhat($IDTL);
	while($row_sausachmoi = mysqli_fetch_array($sausachmoi))
	{
	  ?>
    <div class="col-4 col-xl-2 text-center"> 
   <a href="index.php?p=product&ID_Sach=<?php echo $row_sausachmoi['ID_Sach']?>">
   	<img src="upload/sach/images/<?php if($row_sausachmoi['ID_Sach'] <= 273)
    {
        echo $row_sausachmoi['Hinhanh'];
    }
    else
    {
        echo "new/";echo $row_sausachmoi['Hinhanh'];
    } ?>" alt="book_preview" width="80" height="auto">
    <h6 style="margin-top:10px"><?php echo $row_sausachmoi['Tensach']?></h6>
   </a>
    <b><?php echo number_format($row_sausachmoi['Giasach'])?> đ</b>
    </div>
   <?php
		}
	  ?>
  </div>
</div>
</div>

<?php
}
?>