<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
}

$category = new post();
$categor = $category->category();
$ex = explode(",", str_replace("'", "", substr($categor[0]["column_type"], 5, (strlen($categor[0]["column_type"])-6))));
?>

        <!-- Search -->
        <form action='?page=<?php echo $_GET['page']; ?>' method='POST' enctype='multipart/form-data'>
        <div class="mb-4 mt-3 bg-white rounded-lg flex items-center w-full p-3 shadow-sm border border-gray-200">
            <button @click="getImages()" type="submit" class="outline-none focus:outline-none"><svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
            <input type="search" name="search" @keydown.enter="getImages()" placeholder="Search Animals" x-model="q" class="w-full pl-4 text-sm border-none outline-none focus:outline-none focus:border-none active:border-none bg-transparent" <?php if(isset($_POST['search'])){echo 'value="'.$_POST['search'].'"'; }?> >
            <?php if($_GET['page'] != "forum"){ ?>
            <div class="select">               
                <select name="category" id="" x-model="image_type" class="border-none text-sm outline-none focus:outline-none bg-transparent">               
                <option <?php if(isset($_POST['category']) AND $_POST['category']==""){?> selected="selected" <?php } ?> value="all">Category</option>
                                <?php foreach($ex as $dataca){ ?>
                                    <option <?php if(isset($_POST['category']) AND $_POST['category']=="$dataca"){?> selected="selected" <?php } ?> value="<?php echo $dataca; ?>"> <?php echo $dataca; ?></option>
                                <?php } ?>
               </select>
            </div>
           <?php } ?>
        </div>
        </form>