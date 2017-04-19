
      <footer class="mdl-mega-footer">
       Мангер Юрій
      </footer>
      </main>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".delete-comment").click(function(){
				var id = $(this).attr("data_id");
				$.post("/comment/del/" + id, {}, function(data){
				
				});
				$(this).parent().parent().remove();
			});
		});
	</script>
  </body>
</html>