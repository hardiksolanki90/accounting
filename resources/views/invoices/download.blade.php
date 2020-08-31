<div class="details-container clearfix" style="min-height: 800px;">
   <div id="ember821" class="ember-view">
      <style media="all" type="text/css">
         @font-face {
            font-family: 'WebFont-Ubuntu';
            src: local(Ubuntu), url(https://fonts.gstatic.com/s/ubuntu/v10/4iCs6KVjbNBYlgoKcg72nU6AF7xm.woff2);
         }

         .pcs-template {
            font-family: Ubuntu, 'WebFont-Ubuntu';
            font-size: 9pt;
            color: #333333;
            background: #ffffff;
         }

         .logo-icon {
            width: 50px;
            height: 50;
         }

         .pcs-header-content {
            font-size: 9pt;
            color: #333333;
            background-color: #ffffff;
         }

         .pcs-template-body {
            padding: 0 0.400000in 0 0.550000in;
         }

         .pcs-template-footer {
            height: 0.700000in;
            font-size: 6pt;
            color: #aaaaaa;
            padding: 0 0.400000in 0 0.550000in;
            background-color: #ffffff;
         }

         .pcs-footer-content {
            word-wrap: break-word;
            color: #aaaaaa;
            border-top: 1px solid #adadad;
         }

         .pcs-label {
            color: #333333;
         }

         .pcs-entity-title {
            font-size: 28pt;
            color: #000000;
         }

         .pcs-orgname {
            font-size: 10pt;
            color: #333333;
         }

         .pcs-customer-name {
            font-size: 9pt;
            color: #333333;
         }

         .pcs-itemtable-header {
            font-size: 9pt;
            color: #ffffff;
            background-color: #3c3d3a;
         }

         .pcs-itemtable-breakword {
            word-wrap: break-word;
         }

         .pcs-taxtable-header {
            font-size: 9pt;
            color: #ffffff;
            background-color: #3c3d3a;
         }

         .breakrow-inside {
            page-break-inside: avoid;
         }

         .breakrow-after {
            page-break-after: auto;
         }

         .pcs-item-row {
            font-size: 9pt;
            border-bottom: 1px solid #adadad;
            background-color: #ffffff;
            color: #000000;
         }

         .pcs-item-sku {
            margin-top: 2px;
            font-size: 10px;
            color: #444444;
         }

         .pcs-item-desc {
            color: #333333;
            font-size: 8pt;
         }

         .pcs-balance {
            background-color: #f5f4f3;
            font-size: 9pt;
            color: #000000;
         }

         .pcs-totals {
            font-size: 9pt;
            color: #000000;
            background-color: #ffffff;
         }

         .pcs-notes {
            font-size: 8pt;
         }

         .pcs-terms {
            font-size: 8pt;
         }

         .pcs-header-first {
            background-color: #ffffff;
            font-size: 9pt;
            color: #333333;
            height: auto;
         }

         .pcs-status {
            color: ;
            font-size: 15pt;
            border: 3px solid;
            padding: 3px 8px;
         }

         .billto-section {
            padding-top: 0mm;
            padding-left: 0mm;
         }

         .shipto-section {
            padding-top: 0mm;
            padding-left: 0mm;
         }

         @page :first {
            @top-center {
               content: element(header);
            }

            margin-top: 0.700000in;
         }

         .pcs-template-header {
            padding: 0 0.400000in 0 0.550000in;
            height: 0.700000in;
         }

         .pcs-itemtable-description {
            width: 40%
         }

         .pcs-template-fill-emptydiv {
            display: table-cell;
            content: " ";
            width: 100%;
         }

         /* Additional styles for RTL compat */
         /* Helper Classes */
         .inline {
            display: inline-block;
         }

         .v-top {
            vertical-align: top;
         }

         .text-align-right {
            text-align: right;
         }

         .rtl .text-align-right {
            text-align: left;
         }

         .text-align-left {
            text-align: left;
         }

         .rtl .text-align-left {
            text-align: right;
         }

         /* Helper Classes End */
         .item-details-inline {
            display: inline-block;
            margin: 0 10px;
            vertical-align: top;
            max-width: 70%;
         }

         .total-in-words-container {
            width: 100%;
            margin-top: 10px;
         }

         .total-in-words-label {
            vertical-align: top;
            padding: 0 10px;
         }

         .total-in-words-value {
            width: 170px;
         }

         .total-section-label {
            padding: 5px 10px 5px 0;
            vertical-align: middle;
         }

         .total-section-value {
            width: 120px;
            vertical-align: middle;
            padding: 10px 10px 10px 5px;
         }

         .rtl .total-section-value {
            padding: 10px 5px 10px 10px;
         }

         .tax-summary-description {
            color: #727272;
            font-size: 8pt;
         }

         .bharatqr-bg {
            background-color: #f4f3f8;
         }

         /* Overrides/Patches for RTL compat */
         .rtl th {
            text-align: inherit;
            /* Specifically setting th as inherit for supporting RTL */
         }

         /* Overrides/Patches End */
         /* Signature styles */
         .sign-border {
            width: 200px;
            border-bottom: 1px solid #000;
         }

         .sign-label {
            display: table-cell;
            font-size: 10pt;
            padding-right: 5px;
         }

         /* Signature styles End */
         /* Subject field styles */
         .subject-block {
            margin-top: 20px;
         }

         .subject-block-value {
            word-wrap: break-word;
            white-space: pre-wrap;
            line-height: 14pt;
            margin-top: 5px;
         }

         /* Subject field styles End*/
         .lineitem-header {
            padding: 5px 10px 5px 5px;
            word-wrap: break-word;
         }

         .rtl .lineitem-header {
            padding: 5px 5px 5px 10px;
         }

         .lineitem-column {
            padding: 10px 10px 5px 10px;
            word-wrap: break-word;
            vertical-align: top;
         }

         .lineitem-content-right {
            padding: 10px 10px 10px 5px;
         }

         .rtl .lineitem-content-right {
            padding: 10px 5px 10px 10px;
         }

         .total-number-section {
            width: 45%;
            padding: 10px 10px 3px 3px;
            font-size: 9pt;
            float: left;
         }

         .rtl .total-number-section {
            float: right;
         }

         .total-section {
            width: 50%;
            float: right;
         }

         .rtl .total-section {
            float: left;
         }
      </style>
      <div class="pcs-template ">
         <div class="pcs-template-header pcs-header-content" id="header">
            <div class="pcs-template-fill-emptydiv"></div>
         </div>
         <div class="pcs-template-body">
            <table style="width:100%;table-layout: fixed;">
               <tbody>
                  <tr>
                     <td style="vertical-align: top; width:50%;">
                        <div>
                        </div>
                        {{-- <img src="{{ $data['setting']->logo }}" height=100 width=300 class="logo-icon" alt="logo icon"></img> --}}
                        <span class="pcs-orgname"><b>Suposa Technologies</b></span><br>
                        <span class="pcs-label">
                           <span style="white-space: pre-wrap;word-wrap: break-word;" id="tmp_org_address">
                              <span>{{ $data['setting']->address }}</span><br />
                              <span>{{ $data['setting']->city }}</span> <span>{{ $data['setting']->state }}</span>
                              <span>{{ $data['setting']->zip }}</span><br />
                              India <br />
                              hello@suPOsatech.com</span>
                        </span>
                     </td>
                     <td style="width:50%;" class="text-align-right v-top">
                        <span class="pcs-entity-title">TAX INVOICE</span><br>
                        <span id="tmp_entity_number" style="font-size: 10pt;" class="pcs-label"><b>#
                              {{ getInvoiceCombination($data['invoice']->id) }}</b></span>
                     </td>
                  </tr>
               </tbody>
            </table>
            
            <table style="clear:both;width:100%;margin-top:30px;table-layout:fixed;">
               <tbody>
                  <tr>
                     <td style="width:60%;vertical-align:bottom;word-wrap: break-word;">
                        <div class="billto-section"><label style="font-size: 10pt;" class="pcs-label"
                              id="tmp_billing_address_label">Bill To</label>
                           <br>
                           <span style="white-space: pre-wrap;" id="tmp_billing_address"><strong><span
                                    class="pcs-customer-name"
                                    id="zb-pdf-customer-detail">{{ model($data['invoice']->client, 'name') }}</span></strong><br />
                              {{ model($data['invoice']->client, 'address') }}
                           </span>
                        </div>

                     </td>
                     <td align="right" style="vertical-align:bottom;width: 40%;">
                        <table style="float:right;width: 100%;table-layout: fixed;word-wrap: break-word;" border="0"
                           cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td style="padding:5px 10px 5px 0px;font-size:10pt;" class="text-align-right">
                                    <span class="pcs-label">Invoice Date :</span>
                                 </td>
                                 <td class="text-align-right">
                                    <span
                                       id="tmp_entity_date">{{ date_format(date_create($data['invoice']->date), 'd M Y') }}</span>
                                 </td>
                              </tr>
                              {{-- <tr>
                                <td style="padding:5px 10px 5px 0px;font-size: 10pt;" class="text-align-right">
                                   <span class="pcs-label">Terms :</span>
                                </td>
                                <td class="text-align-right">
                                   <span id="tmp_payment_terms">Due On Receipt</span>
                                </td>
                             </tr> --}}
                              <tr>
                                 <td style="padding:5px 10px 5px 0px;font-size: 10pt;" class="text-align-right">
                                    <span class="pcs-label">Due Date :</span>
                                 </td>
                                 <td class="text-align-right">
                                    <span
                                       id="tmp_due_date">{{ date_format(date_create($data['invoice']->due_date), 'd M Y') }}</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
            {{-- <div style="white-space: pre-wrap;margin-top: 20px;line-height: 14pt;" id="tmp_attention_content">Place Of Supply: Tamil Nadu (33)</div> --}}
            <div id="subject_field" class="subject-block">
               {{-- <div id="tmp_subject_label" class="pcs-label subject-block-label">Subject :</div> --}}
               {{-- <div class="subject-block-value">Description</div> --}}
            </div>
            <table style="width:100%;margin-top:20px;table-layout:fixed;" class="pcs-itemtable" border="0"
               cellspacing="0" cellpadding="0">
               <thead>
                  <tr style="height:32px;">
                     @if ($data['invoice']->billing_type == 'hourly')
                     <td style="padding: 5px 0px 5px 5px;width: 5%;text-align: center;" id=""
                        class="pcs-itemtable-header pcs-itemtable-breakword">
                        #
                     </td>
                     <td style="padding: 5px 10px 5px 20px;width: 40%;text-align: left;" id=""
                        class="pcs-itemtable-header pcs-itemtable-breakword">
                        Description
                     </td>
                     <td style="padding: 5px 10px 5px 5px;width: 20%;text-align: right;" id=""
                        class="pcs-itemtable-header pcs-itemtable-breakword">
                        Hours
                     </td>
                     <td style="padding: 5px 10px 5px 5px;width: 20%;text-align: right;" id=""
                        class="pcs-itemtable-header pcs-itemtable-breakword">
                        Per Hours Price
                     </td>
                     <td style="padding: 5px 10px 5px 5px;width: 15%;text-align: right;" id=""
                        class="pcs-itemtable-header pcs-itemtable-breakword">
                        Amount
                     </td>
                     @endif
                     @if ($data['invoice']->billing_type == 'fixed')
                     <td style="padding: 5px 0px 5px 5px;width: 5%;text-align: center;" id=""
                        class="pcs-itemtable-header pcs-itemtable-breakword">
                        #
                     </td>
                     <td style="padding: 5px 10px 5px 20px;width: 50%;text-align: left;" id=""
                        class="pcs-itemtable-header pcs-itemtable-breakword">
                        Description
                     </td>
                     <td style="padding: 5px 10px 5px 5px;width: 45%;text-align: right;" id=""
                        class="pcs-itemtable-header pcs-itemtable-breakword">
                        Rate
                     </td>
                     @endif

                  </tr>
               </thead>
               <tbody class="itemBody">
                  @if ($data['invoice']->billing_type == 'hourly')
                  @if (count($data['invoice']->invoiceDetail))
                  @foreach ($data['invoice']->invoiceDetail as $item)
                  <tr class="breakrow-inside breakrow-after">
                     <td rowspan="1" valign="top"
                        style="padding: 10px 0 10px 5px;text-align: center;word-wrap: break-word;" class="pcs-item-row">
                        1
                     </td>
                     <td rowspan="1" valign="top" style="padding: 10px 0px 10px 20px;" class="pcs-item-row">
                        <div>
                           <div>
                              <span style="word-wrap: break-word;"
                                 id="tmp_item_name">{{ $item->description }}</span><br>
                           </div>
                        </div>
                     </td>
                     <td rowspan="1" valign="top"
                        style="padding: 10px 10px 5px 10px;text-align:right;word-wrap: break-word;"
                        class="pcs-item-row">
                        <span id="tmp_item_qty">{{ $item->hours }}</span>
                     </td>
                     <td rowspan="1" class="pcs-item-row lineitem-column text-align-right">
                        <span id="tmp_item_rate">{{ number_format($item->per_hour_price, 2) }}</span>
                     </td>
                     <td rowspan="1" class="pcs-item-row lineitem-column lineitem-content-right text-align-right">
                        <span id="tmp_item_amount">{{ number_format($item->total, 2) }}</span>
                     </td>
                  </tr>
                  @endforeach
                  @endif
                  @endif
                  @if ($data['invoice']->billing_type == 'fixed')
                  <tr class="breakrow-inside breakrow-after">
                     <td rowspan="1" valign="top"
                        style="padding: 10px 0 10px 5px;text-align: center;word-wrap: break-word;" class="pcs-item-row">
                        1
                     </td>
                     <td rowspan="1" valign="top" style="padding: 10px 0px 10px 20px;" class="pcs-item-row">
                        <div>
                           <div>
                              <span style="word-wrap: break-word;"
                                 id="tmp_item_name">{{ $data['invoice']->fdescription }}</span><br>
                           </div>
                        </div>
                     </td>
                     <td rowspan="1" class="pcs-item-row lineitem-column lineitem-content-right text-align-right">
                        <span id="tmp_item_amount">{{ number_format($data['invoice']->cost, 2) }}</span>
                     </td>
                  </tr>
                  @endif
               </tbody>
            </table>
            <div style="width: 100%;margin-top: 1px;">
               <div class="v-top total-number-section">
                  <div style="white-space: pre-wrap;"></div>
               </div>
               <div class="v-top total-section">
                  <table class="pcs-totals" cellspacing="0" border="0" width="100%">
                     <tbody>
                        <tr>
                           <td class="total-section-label text-align-right">Tax Apply</td>
                           <td id="tmp_subtotal" class="total-section-value text-align-right">
                              {{ number_format($data['invoice']->applicable_tax_percentage, 2) }}</td>
                        </tr>
                        <tr>
                           <td class="total-section-label text-align-right">Sub Total</td>
                           <td id="tmp_subtotal" class="total-section-value text-align-right">
                              {{ getCurrency($data['invoice']->client) }} {{ number_format($data['sub_total'], 2) }}
                           </td>
                        </tr>
                        <tr>
                           <td class="total-section-label text-align-right"><b>Total</b></td>
                           <td id="tmp_total" class="total-section-value text-align-right">
                              <b>{{ getCurrency($data['invoice']->client) }} {{ number_format($data['total'], 2) }}</b>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div style="clear: both;"></div>
            </div>
            <div style="clear:both;margin-top:50px;width:100%;">
               <label style="font-size: 10pt;" id="tmp_notes_label" class="pcs-label">Notes</label><br>
               <p style="margin-top:7px;white-space: pre-wrap;word-wrap: break-word;" class="pcs-notes">Thanks for your
                  business.</p>
            </div>

            <div style="clear:both;margin-top:30px;width:100%;">
               <label style="font-size: 10pt;" id="tmp_terms_label" class="pcs-label">Terms &amp; Conditions</label><br>
               <p style="margin-top:7px;white-space: pre-wrap;word-wrap: break-word;" class="pcs-terms">Your company's
                  Terms and Conditions will be displayed here. You can add it in the Invoice Preferences page under
                  Settings.</p>
            </div>
            <div style="page-break-inside: avoid;">
               <div style="margin-top:30px;" class="">
                  <label class="pcs-label sign-label">Authorized Signature</label>
                  <div style="display: table-cell;">
                     <div class="sign-border inline"></div>
                     <div></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="pcs-template-footer">
            <div>
            </div>
         </div>
      </div>
   </div>
</div>