<div class="row">
			<h3>FORMS</h3>
				<form class="col s12">
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
							<input placeholder="Placeholder" id="first_name" type="text" class="validate">
							<label for="first_name">First Name</label>
						</div>
						<div class="input-field col s6">
							<input id="last_name" type="text" class="validate">
							<label for="last_name">Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input disabled value="I am not editable" id="disabled" type="text" class="validate">
							<label for="disabled">Disabled</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password" type="password" class="validate">
							<label for="password">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="email" type="email" class="validate">
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
							<select>
							  <option value="" disabled selected>Choose your option</option>
							  <option value="1">Option 1</option>
							  <option value="2">Option 2</option>
							  <option value="3">Option 3</option>
							</select>
							<label>Materialize Select</label>
						</div>
						<div class="input-field col s12 m6">
							<select class="icons">
							  <option value="" disabled selected>Choose your option</option>
							  <option value="" data-icon="images/sample-1.jpg" class="circle">example 1</option>
							  <option value="" data-icon="images/office.jpg" class="circle">example 2</option>
							  <option value="" data-icon="images/yuna.jpg" class="circle">example 1</option>
							</select>
							<label>Images in select</label>
						</div>
						
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="textarea1" class="materialize-textarea"></textarea>
							<label for="textarea1">Textarea</label>
						</div>
						
					</div>
					<div class="row">
						
						<div class="input-field col s12 m6">
						  <input name="group1" type="radio" id="test1" />
						  <label for="test1">Red</label>
						  <input name="group1" type="radio" id="test2" />
						  <label for="test2">Yellow</label>
						</div>
						<div class="input-field col s12 m6">
							  <input type="checkbox" id="test5" />
							  <label for="test5">Red</label>
							  &nbsp &nbsp
							  <input type="checkbox" id="test6" checked="checked" />
							  <label for="test6">Yellow</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							
							<input type="date" class="datepicker">
							<label for="last_name">Tanggal</label>
						</div>
					</div>
				</form>
			</div>