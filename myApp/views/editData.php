<?php include 'html_scripts.php'; ?>
<body>
    
    <?php include 'shared_header.php'; ?> 
    
    <div class="main-div-body">
        <div class="containerr">

            <div class="header-title">
                <h2>Edit Product</h2>
            </div>
            <?php if (isset($product) && !empty($product)): ?>
                <?php $newArr = $product[0]; ?>
                <form action="/updateProduct" method="put">
                    <input type="hidden" name="id" value="<?php echo $newArr['id']; ?>">
                    <div class="containerr2">
                        
                        <div class="row">
                            <label for="name">Name: </label>
                            <input name="name" id="name" type="text" class="input-div" value="<?php echo $newArr['name_product']; ?>">
                        </div>
                            
                        <div class="row">
                            <label for="Desc">Description: </label>
                            <textarea name="Desc" id="Desc" class="input-div"><?php echo $newArr['description_product']; ?></textarea>
                        </div>
                            
                        <div class="row">
                            <label for="price">Price: </label>
                            <input name="price" id="price" type="number" class="input-div" value="<?php echo $newArr['price_product']; ?>">
                        </div>

                        <div class="div-toggle">
                            <label for="check">Status:</label>
                            <div class="toggle">  
                                <input type="checkbox" name="check" value="Available" id="check" <?php echo $newArr['status_product'] === 'Available' ? 'checked' : ''; ?>> 
                                <label for="check" class="btn"></label>
                            </div>
                        </div>
                        
                        <input type="submit" value="Update" class="submit-class">
                    </div>
                </form>
            <?php else: ?>
                <p>No product data available.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <?php include 'shared_footer.php'; ?> 
    
</body>
<?php include 'footer_scripts.php'; ?>
