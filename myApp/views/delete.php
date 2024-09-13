<?php include 'html_scripts.php' ?>
<body>
    
    <?php include 'shared_header.php'; ?> 
    

    <div class="main-div-body">
        <div class="containerr">

            <div class="header-title">
                <h2>Add New Product</h2>
            </div>
            <form action="/delete" method="get">
                <div class="containerr2">
                    
                    <div class="row"><label for="name" >Name: </label><input name="name" id="name" type="text" class="input-div"></div>
                        
                    <div class="row"><label for="Desc">Description: </label><textarea name="Desc" id="Desc" type="text" class="input-div"></textarea></div>
                        
                    <div class="row"><label for="price" >Price: </label><input name="price" id="price" type="number" class="input-div"></div>

                    <div class="div-toggle">
                        <label for="check">Status: </label>
                            <div class="toggle">  
                                
                                <input type="checkbox" name="check" value="Available" id="check">Delete 
                                <label for="check" class="btn"></label>
                                
                            </div>
                    </div>
                    
                    <input type="submit" value="Delete" class="submit-class">

                </div>
            </form>
        </div>
    </div>
    
    <?php include 'shared_footer.php'; ?> 
    
   
</body>
<?php include 'footer_scripts.php' ?>