[![N|Solid](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_2xNcndqIMP1vKpf05m_c_BpnjiXx8gp9WPycBtMIuYEiJaXhnQ)](https://ufo-engineering.com/)

For OpenCart 3.0.3

# For setup you need!
  - download https://github.com/ufo-engineering/product-dimension-grid/archive/master.zip
  - rename product-dimension-grid-master.zip to product-dimension-grid.ocmod.zip
  - go to admin-panel /admin/index.php?route=marketplace/installer and load your module.
  - go to extensions list /admin/index.php?route=marketplace/extension Choose the extension type: modules and find [UFO] Product dimensions grid. Push Install.
  - Don't forget refresh modification after load new module admin/index.php?route=marketplace/modification

Look examples-view/catalog/view/theme/your_theme/template/product/product.twig-sample (line:112)
You need to add the table manually to your theme

	<h3>{{ text_option }}</h3>
								{% if dimension_grid|length > 1 %}
								<div class="form-group">
									<table class="table table-striped table-bordered">
										<col width="120">
										<col width="60">
										<col width="60">
										<col width="60">
										<col width="60">
										<col width="60">

									{% for key, option in dimension_grid %}
										<tr>
										{% if key == 0 %}
											<th>{{ text_size }}</th>
												{% for value in option.product_option_value %}
													<th style="text-align:center">{{ value.name }}</th>
												{% endfor %}

										{% else %}
											<td>{{ option.name }}</td>
											{% for value in option.product_option_value %}
												<td align="center">{{ value.name }}</td>
											{% endfor %}
										{% endif %}

										</tr>
									{% endfor %}
									</table>
								</div>
								{% else %}
									<p>{{ text_no_size }}</p>
								{% endif %}
	Look examples-view/admin/view/template/catalog/product_form.twig find by "product_size_id" and add all html data to your template
								
