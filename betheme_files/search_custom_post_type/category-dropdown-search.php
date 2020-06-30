  <div class="header_search">
    					<form method="get" id="searchform" action="<?= esc_url( home_url( '/' ) ) ?>">
                        	<input type="hidden" name="post_type" value="product" />
                        	<input type="text" class="field" name="s" id="s" placeholder="Product Search" />
                        	<select name="category">
                                <option value="***cat_slug***">All Category</option>
                                <option value="***cat_slug***">Cat. name</option>
                                <option value="***cat_slug***">Cat. name</option>
                            </select>
                        	<button type="submit" class="SearchBtn"><i class="fa fa-search"></i></button>
                       
                        </form>
    				</div>