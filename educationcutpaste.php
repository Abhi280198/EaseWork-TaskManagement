<!-- popup -->
    <div class="form-popup" id="useTemplatePopup">
        <form action="/action_page.php" class="form-container">
            <div class="header">
            <h3>Create Board from this Template </h3>
                                        
            </div><br>
            <div style="margin-left: 30px;">                          
            <label for="title"><b>Title Name:</b></label>
            <input type="text" placeholder="title" name="title" required><br><br>

            <label for="title"><b>Team Name:</b></label>
            <select name = "dropdown">
            <option value = "No Team" selected>No Team</option>
            <option value = "Team names">Team names</option>
            </select>
            <br><br>
            <label for="title"><b>Visibility:</b></label>
            <select name = "dropdown">
                <option value = "Private" selected>Private</option>
                <option value = "Team">Team</option>
                <option value = "Public">Public</option>
            </select>
            </div>
            <br><br>
            <center>
                <div class="canclebtn">
                <a href="board_link.php" type="button" class="btn cancel">Create</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn cancel" onclick="closeTemplatePopup()" >Cancel</button>
                </div>
            </center>
        </form>
    </div>
    <!--END popup -->


    <!-- start create board link -->
            <div class="w3-bar w3-black">
                <div class="w3-bar-item" style="margin-left: 400px;">This is a Class Management Template.</div>
                <div class="w3-bar-item"></div>
                <a href="#" class="w3-bar-item w3-green" onclick="openTemplatePopup()">Create board from Template</a>

                <script>
                    function openTemplatePopup() 
                    {
                        document.getElementById("useTemplatePopup").style.display = "flex";
                    }

                    function closeTemplatePopup() 
                    {
                        document.getElementById("useTemplatePopup").style.display = "none";
                    }
                </script>

            </div>
            <!-- end create board link --> 