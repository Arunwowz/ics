<div class="<?php esc_attr_e( 'row g-0','wpbot');?>">
    <div class="<?php esc_attr_e( 'col-sm-10','wpbot');?>">
        <div class="<?php esc_attr_e( 'form-check form-switch my-4','wpbot');?>">
            <input class="<?php esc_attr_e( 'form-check-input','wpbot');?>" type="checkbox" <?php echo (get_option( 'ai_enabled') == 1) ? esc_attr( 'checked','wpbot') :'';?>  role="switch" value="" id="<?php esc_attr_e( 'is_ai_enabled','wpbot'); ?>">
            <label class="<?php esc_attr_e( 'form-check-label','wpbot');?>" for="<?php esc_attr_e( 'is_ai_enabled','wpbot'); ?>">
            <?php  esc_html_e( 'Enable Open AI','wpbot'); ?>
            </label>
        </div>
        <div class="<?php esc_attr_e( 'form-check form-switch my-4','wpbot');?>">
            <input class="<?php esc_attr_e( 'form-check-input','wpbot');?>" type="checkbox" <?php echo (get_option( 'ai_only_mode') == 1) ? esc_attr( 'checked','wpbot')  :'';?>  role="switch" value="" id="<?php esc_attr_e( 'is_ai_only_mode','wpbot');?>">
            <label class="<?php esc_attr_e( 'form-check-label','wpbot');?>" for="<?php esc_attr_e( 'is_ai_only_mode','wpbot');?>">
            <?php  esc_html_e( 'Enable OpenAI only mode and hide other chatBot features','wpbot');?>
            </label>
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
                <label for="<?php esc_attr_e( 'api_key','wpbot');?>" class="<?php esc_attr_e( 'form-label','wpbot');?>"><?php esc_html_e( 'Api key','wpbot');?></label>
                <input type="text" class="<?php esc_attr_e( 'form-control','wpbot');?>" id="<?php esc_attr_e( 'api_key','wpbot');?>" name="api_key" placeholder="Api key" value="<?php esc_attr_e(get_option( 'open_ai_api_key'),'wpbot'); ?>">
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <label for="<?php esc_attr_e( 'max_tokens','wpbot');?>" class="<?php esc_attr_e( 'form-label','wpbot');?>"><?php esc_html_e( 'Max tokens (0-4000) Depending on the model','wpbot');?></label>
            <input id="<?php esc_attr_e( 'max_tokens','wpbot');?>" class="<?php esc_attr_e( 'form-control','wpbot');?>" type="text" name="max_tokens" value="<?php  esc_attr_e(get_option( 'openai_max_tokens'),'wpbot'); ?>">
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <div class="<?php esc_attr_e( 'row gx-0','wpbot');?>">
                <div class="<?php esc_attr_e( 'col-8','wpbot');?>">
                    <label for="<?php esc_attr_e( 'temperature','wpbot');?>" class="<?php esc_attr_e( 'form-label','wpbot');?>"><?php esc_html_e( 'Temperature','wpbot');?></label>
                </div>
                <div class="<?php esc_attr_e( 'col-4 me-auto text-end','wpbot');?>">
                    <span name="temperatureout" id="<?php esc_attr_e( 'temperatureout','wpbot');?>" ><?php echo esc_html(get_option( 'openai_temperature')); ?></span></div>
                </div>
            <input id="<?php esc_attr_e( 'temperature','wpbot');?>" type="range" class="<?php esc_attr_e( 'form-range','wpbot');?>" min="0" max="1" step="0.01" name="temperature" value="<?php  esc_attr_e(get_option( 'openai_temperature'),'wpbot'); ?>"  onchange="updateTemp(this.value);" />
            <label class="<?php esc_attr_e( 'mb-3','wpbot');?>">
                <small><?php  esc_html_e( 'Temperature is a value between 0 and 1 that essentially lets you control how confident the model should be when making these predictions','wpbot');?></small>
            </label>
            <span name="temperatureout" id="<?php esc_attr_e( 'temperatureout','wpbot');?>" ><?php  echo esc_html(get_option( 'openai_temperature')); ?></span>
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <div class="<?php esc_attr_e( 'row gx-0','wpbot');?>"><div class="<?php esc_attr_e( 'col-8','wpbot');?>"><label for="<?php esc_attr_e( 'presence_penalty','wpbot');?>" class="<?php esc_attr_e( 'form-label','wpbot');?>"><?php esc_html_e( 'Presence Penalty','wpbot');?></label></div><div class="<?php esc_attr_e( 'col-4 me-auto text-end','wpbot');?>"><span id="<?php esc_attr_e( 'presence_penalty_out','wpbot');?>" ><?php echo esc_html(get_option( 'presence_penalty')); ?></span></div></div>
            <input id="<?php esc_attr_e( 'presence_penalty','wpbot');?>" type="range" class="<?php esc_attr_e( 'form-range','wpbot');?>" min="-2" max="2" step="0.1" name="presence_penalty" value="<?php  esc_attr_e(get_option( 'presence_penalty'),'wpbot'); ?>">
            <p class="<?php esc_attr_e( 'mb-3','wpbot');?>"><small><?php  esc_html_e( 'Number between -2.0 and 2.0. Positive values penalize new tokens based on whether they appear in the text so far, increasing the model’s likelihood to talk about new topics.','wpbot');?></small></p>
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <div class="<?php esc_attr_e( 'row gx-0','wpbot');?>"><div class="<?php esc_attr_e( 'col-8','wpbot');?>"><label for="<?php esc_attr_e( 'frequency_penalty','wpbot');?>" class="<?php esc_attr_e( 'form-label','wpbot');?>"><?php esc_html_e( 'Frequency penalty','wpbot');?></label></div><div class="<?php esc_attr_e( 'col-4 me-auto text-end','wpbot');?>"><span id="<?php esc_attr_e( 'frequency_penalty_out','wpbot');?>" ><?php esc_attr_e(get_option( 'frequency_penalty'),'wpbot'); ?></span></div></div>
            <input id="<?php esc_attr_e( 'frequency_penalty','wpbot');?>" type="range" class="<?php esc_attr_e( 'form-range','wpbot');?>" min="-2" max="2" step="0.1" name="frequency_penalty" value="<?php  esc_attr_e(get_option( 'frequency_penalty'),'wpbot');  ?>">
            <label><small><?php  esc_html_e( 'Number between -2.0 and 2.0. Positive values penalize new tokens based on their existing frequency in the text so far, decreasing the model’s likelihood to repeat the same line verbatim.','wpbot');?></small></label>
        </div>

        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <label for="<?php esc_attr_e( 'max_tokens','wpbot');?>" id="<?php esc_attr_e( 'openai_engines','wpbot');?>" class="<?php esc_attr_e( 'form-label','wpbot');?>"><?php esc_html_e( 'Open AI model','wpbot');?></label>
            <select class="<?php esc_attr_e( 'form-select','wpbot');?>" aria-label="Default select example" name="openai_engines" id="<?php esc_attr_e( 'openai_engines','wpbot');?>">
                <option <?php echo ((get_option( 'openai_engines') == '') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Please select Engines','wpbot');?></option>
                <option value="<?php esc_attr_e( 'gpt-4','wpbot'); ?>" <?php echo ((get_option( 'openai_engines') == 'gpt-4') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'GPT-4','wpbot');?></option>
                <option value="<?php esc_attr_e( 'gpt-3.5-turbo','wpbot'); ?>" <?php echo ((get_option( 'openai_engines') == 'gpt-3.5-turbo') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'GPT-3 turbo','wpbot'); ?></option>
            </select>
        </div> 
        
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <label for="<?php esc_attr_e( 'qcld_openai_include_keyword','wpbot');?>"><?php esc_attr_e( 'Connect to OpenAI only when user query includes one of the following Keywords','wpbot');?></label>
            <textarea type="text" class="<?php esc_attr_e( 'form-control','wpbot');?>" id="<?php esc_attr_e( 'qcld_openai_include_keyword','wpbot');?>"><?php echo esc_attr( get_option( 'openai_include_keyword')); ?></textarea>
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <label for="<?php esc_attr_e( 'qcld_openai_exclude_keyword','wpbot');?>"><?php esc_attr_e( 'Connect to OpenAI only when user query does NOT include one of the following Keywords','wpbot');?></label>
            <textarea type="text" class="<?php esc_attr_e( 'form-control','wpbot');?>" id="<?php esc_attr_e( 'qcld_openai_exclude_keyword','wpbot');?>"><?php  echo esc_attr( get_option( 'openai_exclude_keyword')); ?></textarea>
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <div class="<?php esc_attr_e( 'form-check form-switch my-4','wpbot');?>">
                <input class="<?php esc_attr_e( 'form-check-input','wpbot');?>" type="checkbox" <?php echo (get_option( 'qcld_openai_relevant_enabled') == 1) ? esc_attr( 'checked','wpbot') :'';?>  role="switch" value="" id="<?php esc_attr_e( 'is_relevant_enabled','wpbot'); ?>">
                <label class="<?php esc_attr_e( 'form-check-label','wpbot');?>" for="<?php esc_attr_e( 'is_relevant_enabled','wpbot'); ?>">
                <?php  esc_html_e( 'Ask OpenAI to reply when question is relevant to above Keywords (Enabling this option will improve accuracy but it will use OpenAI Tokens)'); ?>
                </label>
            </div>
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <div class="">
                <label><?php esc_html_e('Conversation continuity Only works in promt Q/A, Chat and friend chat'); ?></label>
            </div>
            <div class="<?php esc_attr_e( 'form-check form-switch my-4','wpbot');?>">
                <input class="<?php esc_attr_e( 'form-check-input','wpbot');?>" type="checkbox" <?php echo (get_option( 'conversation_continuity') == 1) ? esc_attr( 'checked') : '';?>  role="switch" value="" id="<?php esc_attr_e( 'conversation_continuity','wpbot');?>">
                <label class="<?php esc_attr_e( 'form-check-label','wpbot');?>" for="<?php esc_attr_e( 'conversation_continuity','wpbot');?>"><?php esc_html_e( 'Enable conversation continuity','wpbot');  ?></label>
            </div>
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            
            <label for="<?php esc_attr_e( 'qcld_openai_prompt','wpbot');?>" class="<?php esc_attr_e( 'form-label','wpbot');?>"><?php esc_html_e( 'Select Prompt','wpbot');?></label>
            <select class="<?php esc_attr_e( 'form-select','wpbot');?>" aria-label="Default select example" name="qcld_openai_prompt" id="<?php esc_attr_e( 'qcld_openai_prompt','wpbot');?>">
                <option <?php echo ((get_option( 'qcld_openai_prompt') == '') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Please select prompt','wpbot');?></option>
                <option value="<?php  esc_attr_e('q_and_a','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'q_and_a') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Q & A','wpbot');?></option>
                <option value="<?php  esc_attr_e('chat','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'chat') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Chat','wpbot');?></option>
                <option value="<?php  esc_attr_e('friend_chat','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'friend_chat') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Friend Chat','wpbot');?></option>
                <option value="<?php  esc_attr_e('grammar_correction','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'grammar_correction') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Grammar correction','wpbot');?></option>
                <option value="<?php  esc_attr_e('marv_sarcastic_chatbot','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'marv_sarcastic_chatbot') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Marv the sarcastic chat bot','wpbot');?></option>
                <option value="<?php  esc_attr_e('micro_horror','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'micro_horror') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Two-Sentence Horror Story:','wpbot');?></option> 
                <option value="<?php  esc_attr_e('write_poem','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'write_poem') ? esc_attr('selected') : '')  ?>><?php esc_html_e( 'Write a poem (in English)','wpbot');?></option>
                <option value="<?php  esc_attr_e('translated_qa','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'translated_qa') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Translated Question Answer on your site language','wpbot');?></option>
                <option value="<?php  esc_attr_e('any_command','wpbot'); ?>" <?php echo ((get_option( 'qcld_openai_prompt') == 'any_command') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Any command','wpbot');?></option>
                <option value="<?php  esc_attr_e('custom_prompt','wpbot'); ?>"  <?php echo ((get_option( 'qcld_openai_prompt') == 'custom_prompt') ? esc_attr('selected') : '') ; ?>><?php esc_html_e( 'Custom prompt will be appended before the user`s queries','wpbot');?></option>
            </select>
            <div id="<?php esc_attr_e( 'custom_prompt_wrapper','wpbot');?>">
                <input type="hidden" id="<?php esc_attr_e( 'custom_promt_value','wpbot');?>" value="<?php  esc_attr_e(get_option('qcld_openai_prompt_custom'),'wpbot'); ?>"/>
            </div>
            <p class="<?php esc_attr_e( 'mb-3','wpbot');?>"><small><?php  esc_html_e( 'Please Select a prompt. The default value of the prompt is Q&A','wpbot');?></small></p>
        </div>
        <div class="<?php esc_attr_e( 'mb-3','wpbot');?>">
            <!-- Customized by Kadir on 05-12-2023 -->
				<a class="<?php esc_attr_e( 'btn btn-success hidden','wpbot');?>" id="<?php esc_attr_e( 'save_setting','wpbot');?>"><?php esc_html_e( 'Save settings','wpbot');?></a>
				<a href="#" class="<?php esc_attr_e( 'btn btn-success','wpbot');?>" id="<?php esc_attr_e( 'settingsModalButtton','wpbot');?>"><?php esc_html_e( 'Save Settings','wpbot');?></a>
			<!-- Ends: Customized by Kadir on 05-12-2023 -->
        </div>
        <div class="<?php esc_attr_e( 'alert alert-danger','wpbot');?>"> 
           <p> <?php echo esc_html('**If OpenAI is not responding back and the bot is just loading, then likely you hit your OpenAI usage limit. Add a'); ?> <a href="https://platform.openai.com/account/billing/overview"><?php echo esc_html('billing detail'); ?></a> <?php echo esc_html('(Credit Card) and increase the Usage limit.'); ?></p>
        </div>
    </div>
</div>

<!-- Customized by Kadir on 05-12-2023 -->

<!-- Modal: OPENAI ALERT - If site search is ON -->
<div class="modal fade" id="SiteSearchDecision" tabindex="-1" role="dialog" aria-labelledby="SiteSearchDecisionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="SiteSearchDecisionLabel">OpenAI Alert</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="alert alert-info">
            Currently SITE SEARCH is turned ON. As per our search algorithm SITE SEARCH gets priority over the AI models.
	        <br><br><strong>Do you want to disable SITE SEARCH so that all responses come from OpenAI?</strong>
        </p>
      </div>
      <div class="modal-footer text-center" style="text-align: center!important;">
        <a class="<?php esc_attr_e( 'btn btn-success','wpbot');?>" id="<?php esc_attr_e( 'save_setting_disable_ss','wpbot');?>"><?php esc_html_e( 'Proceed with Disabling Site Search','wpbot');?></a>
        <a class="<?php esc_attr_e( 'btn btn-primary','wpbot');?>" id="<?php esc_attr_e( 'save_setting','wpbot');?>"><?php esc_html_e( 'Proceed without Disabling Site Search','wpbot');?></a>
      </div>
    </div>
  </div>
</div>

<!-- Modal:OPENAI ALERT - If API Key value is Empty -->
<div class="modal fade" tabindex="-1" role="dialog" id="apiKeyEmptyModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">OpenAI Alert</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="alert alert-danger mb-0">You enabled OpenAI. But the API key is empty!</p>
        <p class="alert alert-info mt-0"><strong>Please set a valid API key.</strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php 

    $isSiteSearchOn = get_option('disable_wp_chatbot_site_search');

    if( $isSiteSearchOn == "" ){
        $isSiteSearchOn = 0;
    }

?>

<script>

    jQuery(document).ready(function($){

        apiKeyValue = $("#api_key").val();

        $("#api_key").on('change', function(){
            apiKeyValue = this.value;
        });

        siteSearchValue = <?php echo $isSiteSearchOn; ?>;        

        $("#settingsModalButtton").click(function(e){

            e.preventDefault();
            
            if( $("#is_ai_enabled").is(':checked') && apiKeyValue.trim() == "" ){
                $('#apiKeyEmptyModal').modal();
            }
            else if( $("#is_ai_enabled").is(':checked') && apiKeyValue.trim() != "" && $("#is_ai_only_mode").is(':checked') ){
                $("#save_setting").trigger("click");
            }
            else if($("#is_ai_enabled").is(':checked') && apiKeyValue.trim() != "" && siteSearchValue == 0){
                $('#SiteSearchDecision').modal();
            }
            else{
                $("#save_setting").trigger("click");
            }

        });
    });

    
</script>

<!-- Ends: Customized by Kadir on 05-12-2023 -->
