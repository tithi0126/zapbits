<?php
include "header.php";
if (isset($_COOKIE['edit_id'])) {
	$mode = 'edit';
	$editId = $_COOKIE['edit_id'];
	$stmt = $obj->con1->prepare("SELECT * FROM `about_details` where id=?");
	$stmt->bind_param('i', $editId);
	$stmt->execute();
	$data = $stmt->get_result()->fetch_assoc();
	$stmt->close();
}
if (isset($_COOKIE['view_id'])) {
	$mode = 'view';
	$viewId = $_COOKIE['view_id'];
	$stmt = $obj->con1->prepare("SELECT * FROM `about_details` where id=?");
	$stmt->bind_param('i', $viewId);
	$stmt->execute();
	$data = $stmt->get_result()->fetch_assoc();
	$stmt->close();
}
if (isset($_REQUEST["btnsubmit"])) {
	$title = $_REQUEST["title"];
	$description = $_REQUEST["description"];
	$icon_img = $_FILES['icon_img']['name'];
	$icon_img = str_replace(' ', '_', $icon_img);
	$icon_img_path = $_FILES['icon_img']['tmp_name'];

	if ($icon_img != "") {
		if (file_exists("images/icon_image/" . $icon_img)) {
			$i = 0;
			$PicFileName = $icon_img;
			$Arr1 = explode('.', $PicFileName);

			$PicFileName = $Arr1[0] . $i . "." . $Arr1[1];
			while (file_exists("images/icon_image/" . $PicFileName)) {
				$i++;
				$PicFileName = $Arr1[0] . $i . "." . $Arr1[1];
			}
		} else {
			$PicFileName = $icon_img;
		}
	}
	try {
		$stmt = $obj->con1->prepare("INSERT INTO `about_details`(`title`,`description`,`icon`) VALUES (?,?,?)");
		$stmt->bind_param("sss", $title,$description, $PicFileName);
		$Resp = $stmt->execute();
		if (!$Resp) {
			throw new Exception(
				"Problem in adding! " . strtok($obj->con1->error, "(")
			);
		}
		$stmt->close();
	} catch (\Exception $e) {
		setcookie("sql_error", urlencode($e->getMessage()), time() + 3600, "/");
	}
	if ($Resp) {
		move_uploaded_file($icon_img_path, "images/icon_image/" . $PicFileName);
		setcookie("msg", "data", time() + 3600, "/");
		header("location:about_details.php");
	} else {
		setcookie("msg", "fail", time() + 3600, "/");
		header("location:about_details.php");
	}
}
if (isset($_REQUEST["btn_update"])) {
	$id = $_COOKIE['edit_id'];
	$title = $_REQUEST["title"];
	$description = $_REQUEST["description"];
	$icon_img = $_FILES['icon_img']['name'];
	$icon_img = str_replace(' ', '_', $icon_img);
	$icon_img_path = $_FILES['icon_img']['tmp_name'];
	//$icon_id = $_REQUEST['icon_id'];
	// $icon_id = $_COOKIE['edit_id'];
	$old_img = $_REQUEST['old_img'];
	if ($icon_img != "") {
		if (file_exists("images/icon_image/" . $icon_img)) {
			$i = 0;
			$PicFileName = $icon_img;
			$Arr1 = explode('.', $PicFileName);

			$PicFileName = $Arr1[0] . $i . "." . $Arr1[1];
			while (file_exists("images/icon_image/" . $PicFileName)) {
				$i++;
				$PicFileName = $Arr1[0] . $i . "." . $Arr1[1];
			}
		} else {
			$PicFileName = $icon_img;
		}
		echo ($old_img);
		unlink("images/icon_image/" . $old_img);

		move_uploaded_file($icon_img_path, "images/icon_image/" . $PicFileName);
	} else {
		$PicFileName = $old_img;
	}
	//echo $PicFileName;
	try {
		//echo"UPDATE `about_details` SET `title`=".$title.",`description`=".$description." ,`icon`= ".$PicFileName." WHERE `id`=".$id."";
		$stmt = $obj->con1->prepare("UPDATE `about_details` SET `title`=?,`description`=?,`icon`=? WHERE `id`=?");
		$stmt->bind_param("sssi", $title, $description , $PicFileName,$id);
		$Resp = $stmt->execute();
		if (!$Resp) {
			throw new Exception(
				"Problem in updating! " . strtok($obj->con1->error, "(")
			);
		}
		$stmt->close();
	} catch (\Exception $e) {
		setcookie("sql_error", urlencode($e->getMessage()), time() + 3600, "/");
	}

	if ($Resp) {
		setcookie("edit_id", "", time() - 3600, "/");
		setcookie("msg", "update", time() + 3600, "/");
		header("location:about_details.php");
	} else {
		setcookie("msg", "fail", time() + 3600, "/");
		header("location:about_details.php");
	}
}
function is_image($filename)
{
	$allowed_extensions = array('jpg', 'jpeg', 'png', 'bmp');
	$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	return in_array($extension, $allowed_extensions);
}
?>
<div class='p-6'>
    <div class="flex gap-6 items-center pb-8">
        <span class="cursor-pointer">
            <a href="javascript:go_back()" class="text-3xl text-black dark:text-white">
                <i class="ri-arrow-left-line"></i>
            </a>
        </span>
        <h1 class="dark:text-white-dar text-2xl font-bold">icon Image -
            <?php echo (isset($mode)) ? (($mode == 'view') ? 'View' : 'Edit') : 'Add' ?></h1>
    </div>
    <div class="panel mt-6">
        <div class="mb-5">
            <form class="space-y-5" method="post" enctype="multipart/form-data">
                <div>
                    <label for="title">Title</label>
                    <input id="title" name="title" type="text" class="form-input" required
                        value="<?php echo (isset($mode)) ? $data['title'] : '' ?>" placeholder="Write Title"
                        <?php echo isset($mode) && $mode == 'view' ? 'readonly' : '' ?> />
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea autocomplete="on" name="description" id="description" class="form-textarea" rows="2" value=""
                        required
                        <?php echo isset($mode) && $mode == 'view' ? 'readonly' : '' ?>><?php echo isset($mode) ? $data['description'] : '' ?></textarea>
                </div>

                <div <?php echo (isset($mode) && $mode == 'view') ? 'hidden' : '' ?>>
                    <label for="image">Image</label>
                    <input id="icon_img" name="icon_img" class="demo1" type="file" data_btn_text="Browse"
                        accept="image/*" onchange="readURL(this,'PreviewImage')"
                        placeholder="drag and drop file here" />
                </div>
                <div>
                    <h4 class="font-bold text-primary mt-2 mb-3"
                        style="display:<?php echo (isset($mode)) ? 'block' : 'none' ?>" id="preview_lable">Preview</h4>
                    <div id="mediaPreviewContainer" style="display:<?php echo (isset($mode)) ? 'block' : 'none' ?>">
                        <img src="<?php echo (isset($mode) && is_image($data["icon"])) ? 'images/icon_image/' . $data["icon"] : '' ?>"
                            name="PreviewMedia" id="PreviewMedia" width="400" height="400"
                            style="display:<?php echo (isset($mode) && is_image($data["icon"])) ? 'block' : 'none' ?>"
                            class="object-cover shadow rounded">

                        <div id="imgdiv" style="color:red"></div>
                        <input type="hidden" name="old_img" id="old_img"
                            value="<?php echo (isset($mode) && $mode == 'edit') ? $data["icon"] : '' ?>" />
                    </div>
                </div>

                <div class="relative inline-flex align-middle gap-3 mt-4 ">
                    <button type="submit"
                        name="<?php echo isset($mode) && $mode == 'edit' ? 'btn_update' : 'btnsubmit' ?>" id="save"
                        class="btn btn-success <?php echo isset($mode) && $mode == 'view' ? 'hidden' : '' ?>">
                        <?php echo isset($mode) && $mode == 'edit' ? 'Update' : 'Save' ?>
                    </button>
                    <button type="button" class="btn btn-danger" onclick="location.href='about_details.php'">Close</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
    function go_back() {
        eraseCookie("edit_id");
        eraseCookie("view_id");
        window.location = "about_details.php";
    }

    function readURL(input, preview) {
        if (input.files && input.files[0]) {
            var filename = input.files.item(0).name;
            var extn = filename.split(".").pop().toLowerCase();

            if (["jpg", "jpeg", "png", "bmp"].includes(extn)) {
                // Handle image preview
                console.log("image");
                displayImagePreview(input, preview);
            } else if (["mp4", "webm", "ogg"].includes(extn)) {
                // Handle video preview
                console.log("video");
                displayVideoPreview(input, preview);
            } else {
                // Display error message for unsupported file types
                $('#imgdiv').html("Unsupported file type. Please select an image or video.");
                document.getElementById('mediaPreviewContainer').style.display = "none";
            }
        }
    }

    function displayImagePreview(input, preview) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('mediaPreviewContainer').style.display = "block";
            $('#PreviewMedia').attr('src', e.target.result);
            document.getElementById('PreviewMedia').style.display = "block";
            document.getElementById('preview_lable').style.display = "block";
            document.getElementById('PreviewVideo').style.display = "none";
        };
        reader.readAsDataURL(input.files[0]);
        $('#imgdiv').html("");
        document.getElementById('save').disabled = false;
    }
    </script>
    <?php
	include "footer.php";
	?>