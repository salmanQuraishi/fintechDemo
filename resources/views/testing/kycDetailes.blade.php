<style>
    body,
    html {
        margin: 0;
        padding: 0;
        font-family: 'Inter', 'Segoe UI', sans-serif;
        background-color: #f8f9fb;
        color: #333;
    }

    .main-content {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    /* ====== Layout Wrappers ====== */
    .ActivationContainer {
        display: flex;
        flex: 1;
        padding: 24px;
        gap: 24px;
    }

    .side-bar {
        width: 260px;
        background-color: #ffffff;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .form-container {
        flex: 1;
        background-color: #fff;
        border-radius: 12px;
        padding: 32px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    /* ====== Sidebar Styles ====== */
    .side-bar-container side-title {
        font-weight: 600;
        font-size: 1.2rem;
        display: block;
        margin-bottom: 8px;
    }

    .side-bar-container p {
        font-size: 0.9rem;
        margin-bottom: 16px;
        color: #555;
    }

    .side-bar-container ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .side-bar-container li {
        font-size: 0.95rem;
        padding: 8px 0;
        color: #555;
        display: flex;
        align-items: center;
    }

    .side-bar-container li.active {
        color: #007bff;
        font-weight: 600;
    }

    .side-bar-container .i-check {
        margin-right: 8px;
        color: green;
    }

    /* ====== Header & Title ====== */
    main-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 32px;
        font-size: 1.4rem;
        font-weight: 600;
    }

    .device--mobile {
        display: none;
    }

    @media (max-width: 768px) {
        .device--mobile {
            display: inline;
        }

        .device--desktop {
            display: none;
        }
    }

    /* ====== Form Styles ====== */
    .Form--tabular {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .Input {
        display: flex;
        flex-direction: column;
    }

    .Input-label {
        font-weight: 500;
        font-size: 0.95rem;
        margin-bottom: 6px;
    }

    .Input-content {
        position: relative;
    }

    .Input-elWrapper {
        position: relative;
    }

    .Input-el {
        width: 100%;
        padding: 10px 14px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #fff;
        outline: none;
        transition: all 0.2s ease;
    }

    .Input-el:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.1);
    }

    textarea.Input-el {
        min-height: 120px;
        resize: vertical;
    }

    .Input--required .Input-label::after {
        content: "*";
        color: red;
        margin-left: 4px;
    }

    /* ====== Error Handling ====== */
    .is-invalid .Input-el {
        border-color: red;
    }

    .Input-error {
        color: red;
        font-size: 0.85rem;
        margin-top: 4px;
    }

    .Input-desc {
        margin-top: 6px;
        font-size: 0.85rem;
        color: #666;
    }

    /* ====== Radio Inputs ====== */
    .Input--radioLabels {
        display: flex;
        gap: 24px;
        margin-top: 8px;
    }

    .Input--radioLabels label {
        display: flex;
        align-items: center;
        cursor: pointer;
        gap: 8px;
        font-size: 0.95rem;
    }

    /* ====== Footer Buttons ====== */
    footer.reverse-flex {
        display: flex;
        justify-content: flex-end;
        gap: 16px;
        padding: 24px 0;
    }

    .Button {
        background-color: #f1f1f1;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.95rem;
    }

    .Button--primary {
        background-color: #007bff;
        color: #fff;
        transition: background-color 0.2s ease;
    }

    .Button--primary:hover {
        background-color: #0056b3;
    }

    /* ====== Support Section ====== */
    .Styled__SupportWrapper-sc-n83gkx-0 {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 1000;
    }

    .Styled__HeaderWrapper-sc-1blfzy7-0 {
        background-color: #007bff;
        color: white;
        padding: 10px 16px;
        border-radius: 24px;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .Styled__HeaderWrapper-sc-1blfzy7-0 svg {
        fill: white;
    }
</style>

<x-guest-layout>
    <main class="main-content">
        <div>
            <div class="ActivationContainer kyc">
                <div class="Activation--wizard Wizard">
                    <div class="">
                        <!-- <aside class="side-bar">
                            <div class="side-bar-container"><side-title>KYC Form</side-title>
                                <p>Complete and submit the form to accept payments.</p>
                                <ul>
                                    <li class="text-success" data-index="0"><i class="i-check text-success"></i>Contact
                                        Info</li>
                                    <li class="active" data-index="1">Business Overview<i class="i i-chevron-right"
                                            data-index="1"></i></li>
                                    <li class="" data-index="2">Business Details</li>
                                </ul>
                            </div>
                        </aside> -->
                        <main class="form-container">
                            <div class=""><main-title classname="main-title"><button
                                        class="device--mobile btn--back Button"><i
                                            class="Button-icon Button-icon--before i-arrow-back"></i></button><span
                                        class="device--mobile main-title-icon"><i class="i-check"></i>Business
                                        Overview</span><span class="device--desktop">Business
                                        Overview</span></main-title>
                                <form novalidate="" class="Form Form--tabular">
                                    <div class="Input Input--required Input--small is-mature">
                                        <div class="Input-label" text="Business Type">Business Type</div>
                                        <div class="Input-content">
                                            <div class="Input-elWrapper Select-elWrapper"><select required=""
                                                    name="business_type" autocomplete="off" class="Input-el">
                                                    <option value="">--Select--</option>
                                                    <option value="1">Proprietorship</option>
                                                    <option value="3" selected="">Partnership</option>
                                                    <option value="4">Private Limited</option>
                                                    <option value="5">Public Limited</option>
                                                    <option value="6">LLP</option>
                                                    <option value="9">Trust</option>
                                                    <option value="10">Society</option>
                                                    <option value="13">HUF</option>
                                                    <option value="11">Individual</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="InputGroup Input">
                                        <div class="Input Input--required Input--small is-mature">
                                            <div class="Input-label" text="Business Category">Business Category</div>
                                            <div class="Input-content">
                                                <div class="Input-elWrapper Select-elWrapper"><select required=""
                                                        name="business_category" autocomplete="off" class="Input-el">
                                                        <option value=""> --Select--</option>
                                                        <option value="ecommerce">Ecommerce</option>
                                                        <option value="education">Education</option>
                                                        <option value="fashion_and_lifestyle">Fashion and Lifestyle
                                                        </option>
                                                        <option value="food">Food and Beverage</option>
                                                        <option value="grocery">Grocery</option>
                                                        <option value="it_and_software" selected="">IT and Software
                                                        </option>
                                                        <option value="healthcare">Healthcare</option>
                                                        <option value="services">Services</option>
                                                        <option value="web_development">Web designing/Development
                                                        </option>
                                                        <option value="accounting">Accounting Services</option>
                                                        <option value="coupons">Ad/Coupons/Deals Services</option>
                                                        <option value="repair_and_cleaning">Automotive Repair Shops
                                                        </option>
                                                        <option value="cab_hailing">Cab Service</option>
                                                        <option value="catering">Caterers</option>
                                                        <option value="charity">Charity</option>
                                                        <option value="computer_programming_data_processing">Computer
                                                            Programming/Data Processing</option>
                                                        <option value="consulting_and_outsourcing">Consulting/PR
                                                            Services</option>
                                                        <option value="financial_services">Financial Services</option>
                                                        <option value="gaming">Gaming</option>
                                                        <option value="drop_shipping">General Merchandise Stores
                                                        </option>
                                                        <option value="government">Government Bodies</option>
                                                        <option value="health_coaching">Health and Beauty Spas</option>
                                                        <option value="housing">Housing and Real Estate</option>
                                                        <option value="logistics">Logistics</option>
                                                        <option value="media_and_entertainment">Media and Entertainment
                                                        </option>
                                                        <option value="not_for_profit">Not-For-Profit</option>
                                                        <option value="others">Others</option>
                                                        <option value="paas">Platform as a Service</option>
                                                        <option value="coworking">Real Estate Agents/Rentals</option>
                                                        <option value="saas">Software as a Service</option>
                                                        <option value="service_centre">Service Centre</option>
                                                        <option value="social">Social</option>
                                                        <option value="telecommunication_service">Pre/Post Paid/Telecom
                                                            Services</option>
                                                        <option value="tours_and_travel">Tours and Travel</option>
                                                        <option value="transport">Transport</option>
                                                        <option value="utilities">Utilities-General</option>
                                                        <option value="utilities_electric_gas_oil_water">
                                                            Utilities–Electric, Gas, Water, Oil</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="Input Input--required Input--small is-mature">
                                            <div class="Input-label" text="Sub Category">Sub Category</div>
                                            <div class="Input-content">
                                                <div class="Input-elWrapper Select-elWrapper"><select required=""
                                                        name="business_subcategory" autocomplete="off" class="Input-el">
                                                        <option value=""> --Select--</option>
                                                        <option value="saas" selected="">SaaS (Software as a service)
                                                        </option>
                                                        <option value="paas">Platform as a service</option>
                                                        <option value="iaas">Infrastructure as a service</option>
                                                        <option value="consulting_and_outsourcing">Consulting and
                                                            Outsourcing</option>
                                                        <option value="web_development">Web designing, development and
                                                            hosting</option>
                                                        <option value="technical_support">Technical Support</option>
                                                        <option value="data_processing">Data processing</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="Input Input--required Input--small is-invalid">
                                            <div class="Input-label" text="Business Description">Business Description
                                            </div>
                                            <div class="Input-content">
                                                <div class="Input-elWrapper"><grammarly-extension
                                                        data-grammarly-shadow-root="true"
                                                        style="position: absolute; top: 0px; left: 0px; pointer-events: none; --rem: 16;"
                                                        class="dnXmp"></grammarly-extension><grammarly-extension
                                                        data-grammarly-shadow-root="true"
                                                        style="position: absolute; top: 0px; left: 0px; pointer-events: none; --rem: 16;"
                                                        class="dnXmp"></grammarly-extension><textarea required=""
                                                        name="business_model" placeholder="Minimum 50 characters"
                                                        autocomplete="off" class="Input-el"
                                                        spellcheck="false"></textarea>0</div>
                                                <div class="Input-error">Please fill out this field</div>
                                                <div class="Input-desc Input--business-description">Please give a brief
                                                    description of the nature of your business. Please include examples
                                                    of products you sell, the business category you operate under, your
                                                    customers and the channels you primarily use to conduct your
                                                    business(Website, offline retail etc).</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Input Input--required Input--small is-invalid">
                                        <div class="Input-label" text="Average Order Value">Average Order Value</div>
                                        <div class="Input-content">
                                            <div class="Input--aov-heading">Any payment received by my business would
                                                usually lie in range</div>
                                            <div class="Input-elWrapper Select-elWrapper"><select required=""
                                                    name="merchant_avg_order_value" autocomplete="off" class="Input-el">
                                                    <option value=""> --Select--</option>
                                                    <option value="1-150">₹ 1 - ₹ 150</option>
                                                    <option value="151-300">₹ 151 - ₹ 300</option>
                                                    <option value="301-600">₹ 301 - ₹ 600</option>
                                                    <option value="601-1000">₹ 601 - ₹ 1000</option>
                                                    <option value="1001-2000">₹ 1001 - ₹ 2000</option>
                                                    <option value="2001-3000">₹ 2001 - ₹ 3000</option>
                                                    <option value="3001-5000">₹ 3001 - ₹ 5000</option>
                                                    <option value="5001-10000">₹ 5001 - ₹ 10000</option>
                                                    <option value="10001-20000">₹ 10001 - ₹ 20000</option>
                                                    <option value="20001-50000">₹ 20001 - ₹ 50000</option>
                                                    <option value="50001-100000">₹ 50001 - ₹ 100000</option>
                                                    <option value="More than ₹ 1,00,000">More than ₹ 1,00,000</option>
                                                </select></div>
                                            <div class="Input-error">Please fill out this field</div>
                                        </div>
                                    </div>
                                    <div class="InputGroup Input">
                                        <div
                                            class="Input Input--required Input--small Input--vTop Input--Website Input--radio">
                                            <div class="Input-label" text="How do you wish to accept payments">How do
                                                you wish to accept payments</div>
                                            <div class="Input-content">
                                                <div class="Input--radioLabels"><label><input type="radio"
                                                            data-name="has_url" required="" class="Input-el"
                                                            autocomplete="off" value="0" checked="">
                                                        <div class="Input-radio"></div>
                                                        <div class="Input-inlineLabel" text="Without website/app">
                                                            Without website/app</div>
                                                    </label><label><input type="radio" data-name="has_url" required=""
                                                            class="Input-el" autocomplete="off" value="1">
                                                        <div class="Input-radio"></div>
                                                        <div class="Input-inlineLabel" text="On my website/app">On my
                                                            website/app</div>
                                                    </label></div>
                                                <div class="Input-desc">
                                                    <ul class="Input-desc-list">
                                                        <li>Receive payments from your customers in under 5 minutes
                                                            using Razorpay’s Payment Links &amp; Payment Pages</li>
                                                        <li>You can submit your website/app anytime later if you wish to
                                                            use it to accept payments</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none;"></div>
                                </form>
                            </div>
                        </main>
                        <footer class="reverse-flex"><span class="Loader"></span>
                            <div class="footer-content"><button class="Button">Save</button><button
                                    class="Button--primary Button"><span class="device--desktop">Save &amp;
                                        Next</span><span class="device--mobile">Next</span><i
                                        class="Button-icon Button-icon--after i-chevron-right"></i></button></div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <label style="margin:20px"> E-Commerce</label>

        <select style="margin:20px" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="ecommerce_marketplace">Horizontal Commerce/Marketplace</option>
            <option value="agriculture">Agricultural products</option>
            <option value="books">Books and Publications</option>
            <option value="electronics_and_furniture">Electronics and Furniture</option>
            <option value="coupons">Coupons and deals</option>
            <option value="rental">Product Rental</option>
            <option value="fashion_and_lifestyle">Fashion and Lifestyle</option>
            <option value="gifting">Flowers and Gifts</option>
            <option value="grocery">Grocery</option>
            <option value="baby_products">Baby Care and Toys</option>
            <option value="office_supplies">Office Supplies</option>
            <option value="wholesale">Wholesale/Bulk trade</option>
            <option value="religious_products">Religious products</option>
            <option value="pet_products">Pet Care and Supplies</option>
            <option value="sports_products">Sports goods</option>
            <option value="arts_and_collectibles">Arts, crafts and collectibles</option>
            <option value="sexual_wellness_products">Sexual Wellness Products</option>
            <option value="drop_shipping">Dropshipping</option>
            <option value="crypto_machinery">Crypto Machinery</option>
            <option value="tobacco">Tobacco</option>
            <option value="weapons_and_ammunitions">Weapons and Ammunitions</option>
            <option value="automobile_parts_and_equipements">MOTOR VEHICLE SUPPLIES</option>
            <option value="jewellery_and_watch_stores">Precious Stones and Metals,Watches and Jewelry</option>
            <option value="shoe_stores_retail">Shoe Stores</option>
            <option value="cosmetic_stores">Cosmetic Stores</option>
            <option value="industrial_supplies">Industrial Supplies</option>
            <option value="computers_peripheral_equipment_software">Computers, Computer Peripheral Equipment, Software
            </option>
            <option value="automobile_and_truck_dealers">Automobile and Truck Dealers-Used Only-Sales</option>
            <option value="accessory_and_apparel_stores">Accessory and Apparel Stores-Miscellaneous</option>
            <option value="furniture_and_home_furnishing_store">Furniture and Home Furnishing store</option>
        </select>

        <label style="margin:20px"> Education</label>

        <select style="margin:20px" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="college">College</option>
            <option value="schools">Schools</option>
            <option value="university">University</option>
            <option value="professional_courses">Professional Courses</option>
            <option value="distance_learning">Distance Learning</option>
            <option value="day_care">Pre-School/Day Care</option>
            <option value="coaching">Coaching Institute</option>
            <option value="elearning">E-Learning</option>
        </select>

        <label style="margin:20px"> Faishion & Lifestyle</label>

        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Food and Beverage</label>

        <!-- No Sub Category Available For This Catagory -->


        <label style="margin:20px"> Grocery</label>

        <!-- No Sub Category Available For This Catagory -->


        <label style="margin:20px"> IT and Software</label>

        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="saas" selected="">SaaS (Software as a service)</option>
            <option value="paas">Platform as a service</option>
            <option value="iaas">Infrastructure as a service</option>
            <option value="consulting_and_outsourcing">Consulting and Outsourcing</option>
            <option value="web_development">Web designing, development and hosting</option>
            <option value="technical_support">Technical Support</option>
            <option value="data_processing">Data processing</option>
        </select>


        <label style="margin:20px"> Healthcare</label>

        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="pharmacy">Pharmacy</option>
            <option value="clinic">Clinic</option>
            <option value="hospital">Hospital</option>
            <option value="lab">Lab</option>
            <option value="dietician">Dietician/Diet Services</option>
            <option value="fitness">Gym and Fitness</option>
            <option value="health_coaching">Health and Lifestyle Coaching</option>
            <option value="health_products">Health Products</option>
            <option value="healthcare_marketplace">Marketplace/Aggregator</option>
            <option value="medical_equipment_and_supply_stores">Dental/Laboratory/Medical/Ophthalmic Hospital Equipment
                and Supplies</option>
            <option value="health_practitioners_medical_services">Health Practitioners, Medical Services-not elsewhere
                classified</option>
        </select>

        <label style="margin:20px"> Services</label>

        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="repair_and_cleaning">Repair and cleaning services</option>
            <option value="interior_design_and_architect">Interior Designing and Architect</option>
            <option value="movers_and_packers">Movers and Packers</option>
            <option value="legal">Legal Services</option>
            <option value="event_planning">Event planning services</option>
            <option value="service_centre">Service Centre</option>
            <option value="consulting">Consulting Services</option>
            <option value="ad_and_marketing">Ad and marketing agencies</option>
            <option value="services_classifieds">Services Classifieds</option>
            <option value="multi_level_marketing">Multi-level Marketing</option>
            <option value="telecommunication_service">Telecom Servc including but not ltd to prepaid phone serv</option>
            <option value="recreational_and_sporting_camps">Recreational and Sporting Camps</option>
            <option value="photographic_studio">Photographic studios</option>
            <option value="professional_services">Professional services</option>
        </select>


        <label style="margin:20px"> Accounting Services</label>
        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Ad/Coupons/Deals Services</label>
        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Automotive Repair Shops</label>
        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Cab Service</label>
        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Caterers</label>
        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Charity</label>
        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Computer Programming/Data Processing</label>
        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Consulting/PR Services</label>
        <!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Financial Services</label>
        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="mutual_fund">Mutual Fund</option>
            <option value="lending">Lending</option>
            <option value="cryptocurrency">Cryptocurrency</option>
            <option value="insurance">Insurance</option>
            <option value="nbfc">NBFC</option>
            <option value="cooperatives">Cooperatives</option>
            <option value="pension_fund">Pension Fund</option>
            <option value="forex">Forex</option>
            <option value="securities">Securities</option>
            <option value="commodities">Commodities</option>
            <option value="accounting">Accounting and Taxes</option>
            <option value="financial_advisor">Financial and Investment Advisors/Financial Advisor</option>
            <option value="crowdfunding">Crowdfunding Platform</option>
            <option value="trading">Stock Brokerage and Trading</option>
            <option value="betting">Betting</option>
            <option value="get_rich_schemes">Get Rich Schemes</option>
        </select>


        <label style="margin:20px"> Gaming</label>
        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="game_developer">Game developer and publisher</option>
            <option value="esports">E-sports</option>
            <option value="online_casino">Online Casino</option>
            <option value="fantasy_sports">Fantasy Sports</option>
            <option value="gaming_marketplace">Game distributor/Marketplace</option>
        </select>

        <label style="margin:20px"> General Merchandise Stores</label>


        <!-- No Sub Category Available For This Catagory -->


        <label style="margin:20px"> Government Bodies</label>


        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="central">Central Department</option>
            <option value="state">State Department</option>
        </select>

        <label style="margin:20px"> Health and Beauty Spas</label>

        <!-- No Sub Category Available For This Catagory -->


        <label style="margin:20px"> Housing and Real Estate</label>

        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="developer">Developer</option>
            <option value="facility_management">Facility Management Company</option>
            <option value="rwa">RWA</option>
            <option value="coworking">Co-working spaces</option>
            <option value="realestate_classifieds">Real estate classifieds</option>
            <option value="space_rental">Home or office rentals</option>
        </select>


        <label style="margin:20px"> Logistics</label>

        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="freight">Freight Consolidation/Management</option>
            <option value="courier">Courier Shipping</option>
            <option value="warehousing">Public/Contract Warehousing</option>
            <option value="distribution">Distribution Management</option>
            <option value="end_to_end_logistics">End-to-end logistics</option>
        </select>


        <label style="margin:20px"> Media and Entertainment</label>
        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="video_on_demand">Video on demand</option>
            <option value="music_streaming">Music streaming services</option>
            <option value="multiplex">Multiplexes</option>
            <option value="content_and_publishing">Content and Publishing</option>
            <option value="ticketing">Events and movie ticketing</option>
            <option value="news">News</option>
        </select>

        <label style="margin:20px"> Not-For-Profit</label>
        <select required="" name="business_subcategory" autocomplete="off" class="Input-el">
            <option value=""> --Select--</option>
            <option value="charity">Charity</option>
            <option value="educational">Educational</option>
            <option value="religious">Religious</option>
            <option value="personal">Personal</option>
        </select>

        
        <label style="margin:20px"> Others</label>

        
        <label style="margin:20px"> Platform as a Service</label>

<!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Real Estate Agents/Rentals</label>

<!-- No Sub Category Available For This Catagory -->

        <label style="margin:20px"> Software as a Service</label>

<!-- No Sub Category Available For This Catagory -->


    </main>
</x-guest-layout>

<script>

    $.(document).ready(function () {



    });


</script>