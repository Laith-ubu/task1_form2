<?php include 'html_scripts.php' ?>
<body>
   
    <?php include 'shared_header.php'; ?> 
    <div class="container-body">
        <div class="main-table-div">
            <div class="content-div">

                <div class="table-title-div">
                    <h2>Products</h2>
                </div>

                <div class="button-table-div">
                    <button type="button"><a style="text-decoration: none; color: white;" href="/addNewForm/">Add New</a>
                </div>

            </div>

            <div class="table-div">

                <table class="TABLE">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>price</th>
                                <th>Satuts</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?php echo $product['id']; ?></td>
                                        <td><?php echo $product['name_product']; ?></td>
                                        <td><?php echo $product['description_product']; ?></td>
                                        <td><?php echo $product['price_product']; ?></td>
                                        <td><?php echo $product['status_product']; ?></td>
                                        <td>
                                            <!-- Edit Button -->
                                           <div class="action_btn">
                                            <div class="a1" ><a class="trtr" style="background-color:blue" href="editData?action=edit&id=<?php echo $product['id']; ?>">Edit</a></div>
                                            
                                            <!-- Delete Button -->
                                           <div class="a1" ><a class="trtr" style="background-color:red" href="delete?action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></div>
                                           </div>
                                        </td>
                                    </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No products found.</td>
                                <td>
                                            <!-- Edit Button -->
                                           <div class="action_btn">
                                            <div class="a1" ><a class="trtr" style="background-color:blue" href="index.php?action=edit&id=<?php echo $product['id']; ?>">Edit</a></div>
                                            
                                            <!-- Delete Button -->
                                           <div class="a1" ><a class="trtr" style="background-color:red" href="index.php?action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></div>
                                           </div>
                                        </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php include 'shared_footer.php'; ?> 
    

</body>
<?php include 'footer_scripts.php' ?>