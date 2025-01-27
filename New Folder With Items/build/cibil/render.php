<main class="main cibil-score-page">
    <section class="banner cibil-banner">
        <div id="cibil-banner-section" class="container">
            <div class="banner__inner">
                <div class="banner__content">
                    <h2 class="banner__title h2_title">Funding made easy with your CREDIT check</h2>
                    <!--<p class="banner__descr">The new version of&nbsp;@moqups&nbsp;is really fantastic.</p>-->
                </div>
                <div class="circle-animate">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="banner__image">
                <img
                    src=<?php echo esc_url(get_template_directory_uri()) . "/images/cibil-head-banner-b.png" ?>
                    alt="" class="mobile-img" />
                <?Php /* ?> <img
					src=<?php echo esc_url(get_template_directory_uri()) . "/images/mobile.webp" ?>
					alt="" class="mobile-img" />
				<img
					src=<?php echo esc_url(get_template_directory_uri()) . "/images/mobile-content.png" ?>
					alt="" class="mobile-content-img" /> <?Php */ ?>
            </div>
        </div>
    </section>

    <section class="cibil">
        <div class="container">
            <div class="cibil__inner">
                <form class="cibil__form" method="POST" id="cibilForm">
                    <div class="cibil__top">
                        <input class="cibil__form-input" name="name" type="text" placeholder="Name*" required>
                        <input class="cibil__form-input" name="email" type="text" placeholder="Email Id*" required>
                        <input class="cibil__form-input" name="pancard" type="text" placeholder="Pancard*" required>
                    </div>
                    <div class="cibil__selects">
                        <div class="custom-select">
                            <select class="apply__form-select" name="category" required>
                                <option value="" disabled selected>Category*</option>
                                <option value="Salaried">Salaried </option>
                                <option value="Self Employed">Self Employed</option>
                                <option value="Professional">Professional</option>
                            </select>
                        </div>
                        <div class="custom-select">
                            <select class="apply__form-select" name="loan-type" required>
                                <option value="" disabled selected>Loan Type*</option>
                                <option value="Home Loan">Home Loan</option>
                                <option value="Mortgage Loan / LAP">Mortgage Loan / LAP</option>
                                <option value="Working Capital Loan">Working Capital Loan</option>
                                <option value="Balance Transfer">Balance Transfer</option>
                                <option value="Personal Loan">Personal Loan</option>
                                <option value="Business Loan">Business Loan</option>
                                <option value="Overdraft">Overdraft</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>
                    </div>
                    <div id="otp_input_container" class="cibil__selects">
                        <div class="cibil__otp-item mobile-number">
                            <div class="cibil__otp-input ">
                               
                                <input class="cibil__form-input" id="mobile-number" name="mobile-number" type="text"
                                    placeholder="Mobile Number*" required>
                                <span id="mobileerror" style="color:red;font-size:15px"></span>
                                <span id="mobilesuccess" style="color:green;font-size:15px"></span>
								 <label class="mobile-number-label" for="mobile-number">Note: Use the number registered with your bank account.</label>

                            </div>
                        </div>
						<div class="cibil__otp-input otpsend-btn">
                                <button type="button" id="otpsend" class="cibil__otp-btn cibil__otp-resend">Send OTP</button>
                                <span id="timer"></span>
                            </div>
                        <div class="cibil__otp-item cibil__otp-block">
                            <div class="cibil__otp-input  ">
                                <!-- <span id="otperror" style="color:red;font-size:15px"></span>
                                <span id="otpsuccess" style="color:green;font-size:15px"></span> -->
								<span id="otpStatus">
                                <span class="otpStatus-success">&#10003;</span>
                                <span class="otpStatus-error">&#10005;</span>
                                </span>
                                <input class="cibil__form-input" id="OTP" name="OTP" type="text"
                                    placeholder="OTP*" required disabled>
                                
                            </div>
                        </div>
                    </div>
                    <label class="cibil__label">
                        <input type="checkbox" name="checkbox" class="cibil__checkbox" required>
                        <span class="checkmark"></span>
                        <span>I agree to <a target="_blank" href="/privacy-policy/">Privacy Policy</a> & <a target="_blank" href="/credit-score-terms/">Terms and Conditions</a> of
                            Loan Bazaar.</span>

                    </label>

                    <!--  <div class="cibil-otp-block">
                        <div class="cibil__otp">
                            <div class="cibil__otp-item active get-otp">

                                
                                <button type="button" class="cibil__otp-btn cibil__otp-get">Get OTP</button>
                                <p class="cibil__otp-sended">OTP has been sent to your mobile number and email id.
                                    Please enter
                                    the
                                    OTP to complete your eligibility check. This will not impact your credit score.</p>
                                
                            </div> -->
                    <!--
                            <div class="cibil__otp-item">
                                <div class="cibil__otp-input">
                                    <input class="cibil__form-input" id="otp-password" name="otp-password" type="text"
                                        placeholder="One Time Password" required>
                                </div>
                                <a href="#" type="button" class="cibil__otp-btn cibil__otp-resend">Resend OTP</a>
                            </div>
                        
                        </div>
                         <p class="cibil__otp-sended">OTP sent to your mobile number and email id. Please enter the
                            OTP to complete your eligibility check. This will not impact your credit score.</p> 
                    </div> -->

                    <button type="submit" class="cibil__form-btn btn" id="form-submit">Submit</button>
                </form>
                <?php /*
                $file_url = 'https://lb.tspace.in/wp-content/uploads/2025/01/basic-link-1.pdf'; // PDF URL
                $upload_response = upload_pdf_from_url($file_url);

                if ($upload_response) {
                    print_r($upload_response);
                } else {
                    echo 'not working';
                    //  print_r($response['error']);
                }
*/
                ?>


            </div>
            <div class="page__content">
                <div>
                    <h3 class="wp-block-heading">Your Credit Score carries weight ...</h3>
                    <p>
                        Your Credit Score is nothing more than just a 3 digit number, which will be a source of happiness for you in terms of availing best loan rates and new credit cards in the market.
                    </p>
                    <ul>
                        <li class="cards-about__descr">
                            <strong>Trace your Credit Health</strong>
                            <p>Fill out the form just once and track your Credit score for free with ease to make smarter financial decisions and maintain a strong credit profile.
                            </p>
                        </li>
                        <li class="cards-about__descr">
                            <strong>Get in-depth Knowledge</strong>
                            <p>See what makes your score change to enhance strategies to improve your credit health.</p>
                        </li>
                        <li class="cards-about__descr">
                            <strong>Make wiser decisions</strong>
                            <p>Personalized recommendations based on your Credit history to save money & spend wisely.</p>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="wp-block-heading credit-heading" style="text-align: center">THE CREDIT STORY</h3>
                    <p>
                        The history of credit scores in India began in the late 20th
                        century when lending was primarily based on personal
                        relationships and informal systems. In early 2000s, banks and
                        financial institutions relied on subjective methods like
                        assessing income and assets to determine creditworthiness, which
                        often led to inconsistent lending practices. This lack of
                        standardization made it difficult for many borrowers,
                        particularly in urban and semi-urban areas, to access formal
                        credit.
                    </p>
                    <p>
                        The turning point came in 2000 with the establishment of CIBIL
                        (Credit Information Bureau India Limited), which introduced the
                        first formalized credit score system in India. This new system
                        used a numeric score ranging from 300 to 900 to evaluate an
                        individual's creditworthiness based on their credit history. As
                        India's financial landscape evolved, the RBI has recognized the
                        importance of credit bureaus, and the government encouraged more
                        companies like Experian and Equifax to enter the market. This
                        shift improved the accuracy and transparency of lending,
                        benefiting consumers and financial institutions alike.
                    </p>
                    <p>
                        The Indian government's push for a Digital India and financial
                        inclusion has led to the integration of credit scores into
                        various digital platforms. With the growing number of
                        individuals participating in the digital economy, the demand for
                        credit is only expected to increase, making the credit score
                        system even more integral to India's financial ecosystem.
                    </p>
                </div>
                <div class="credit-score-btn">
                    <a href="#cibil-banner-section" class="">
                        <img
                            src=<?php echo esc_url(get_template_directory_uri()) . "/images/get-credit-score-btn.gif" ?>
                            alt="" class="get-credit-score-img" />
                    </a>
                </div>
                <div>
                    <h3 class="wp-block-heading">Definition of Credit Score:</h3>
                    <p>
                        Credit score can simply be defined as a rating system that
                        numerically represents the 'Creditworthiness' of a borrower. It
                        is in the form of a three-digit number. The credit score ranges
                        from a minimum of 300 to a maximum of 900.
                    </p>
                    <p>
                        More importantly, as a borrower, you need to understand that the
                        closer your Credit score is to 800-900, the better your chance
                        of securing any type of loan or getting a credit card in India.
                    </p>
                    <p>
                        It is also advisable that you perform a Credit score check
                        regularly.
                    </p>
                </div>
                <div>

                    <!--
					<p>
						Banner for 'Steps for getting Cibil score at Loan bazaar
						website.'
					</p>
					<img class="page-content-img" src="/wp-content/themes/loan-bazaar/images/cibil-score.png" alt="" />
-->
                </div>
                <div>
                    <h3 class="wp-block-heading">Detailed explanation of Credit score Calculation:</h3>
                    <h4>Steps to get your Free Credit Score: Perform a credit score check online effortlessly.</h4>
                    <ol class="decimal">
                        <li>Visit Loan Bazaar Credit Page.</li>
                        <li>Enter your first and last name.</li>
                        <li>Select Category (Salaried/ Self-employed/ Professional)</li>
                        <li>Select the type of loan</li>
                        <li>Add your mobile number and email ID.</li>
                        <li>Your Credit score will be displayed on the screen.</li>
                        <li>You can download your report via Mail.</li>
                    </ol>
                </div>

                <div class="credit-score-btn">
                    <a href="#cibil-banner-section" class="">
                        <img
                            src=<?php echo esc_url(get_template_directory_uri()) . "/images/get-credit-score-btn.gif" ?>
                            alt="" class="get-credit-score-img" />
                    </a>
                </div>

                <div>
                    <h3 class="wp-block-heading">Ranges of Credit Scores :</h3>
                    <ul>
                        <li>
                            <h4>NA/NH</h4>
                            <p>
                                This indicates that you have no records in Credit
                                history.
                            </p>
                        </li>
                        <li>
                            <h4>300-549</h4>
                            <p>
                                This range is considered as poor Credit score. It
                                means you have been late in paying EMls for loans or
                                credit card bills. With a Credit score in this
                                range, it will be difficult to get a loan or a
                                credit card as you are a defaulter with high risk.
                            </p>
                        </li>
                        <li>
                            <h4>550-649</h4>
                            <p>
                                A Credit score within this range is considered
                                adequate. It suggests that you will have difficulty
                                paying off your debts on time. The rate of interest
                                on your is also likely to be high.
                            </p>
                        </li>
                        <li>
                            <h4>650-749</h4>
                            <p>
                                If your Credit score is within this range, you are
                                on the right track. You need to continue to
                                demonstrate good credit behavior and keep improving
                                your score. Lenders will review your loan
                                application and offer you a loan. However, you may
                                not yet have the negotiating power to get the best
                                interest rate on a loan.
                            </p>
                        </li>
                        <li>
                            <h4>750-900</h4>
                            <p>
                                This is a good Credit score. It suggests that you
                                are repaying your loans regularly and have a great
                                payment history. Banks will also give you loans and
                                credit cards considering that you are at the lowest
                                risk of defaulting on your loans.
                            </p>
                        </li>
                    </ul>
                </div>

                <div class="credit-score-btn">
                    <a href="#cibil-banner-section" class="">
                        <img
                            src=<?php echo esc_url(get_template_directory_uri()) . "/images/get-credit-score-btn.gif" ?>
                            alt="" class="get-credit-score-img" />
                    </a>
                </div>

                <div>
                    <h3 class="wp-block-heading">Tips from Loan Bazaar to improve Credit score:</h3>
                    <p>Are you looking to take a loan at a minimum ROl or get a Best Credit Card in India? If yes, given below are three points of recommendation that we at 'Loan Bazaar' feel you can use Credit score check online to get a Good Credit Score.</p>
                    <p><strong>1. Use of Balance Transfer Facility: </strong></p>
                    <p>If you are looking to get a Good Credit Score then, one of the best ways is to use Balance Transfer. The BT facility allows you to transfer your current loan from one bank to another at the lowest interest rate available. It enables you to manage credit at lower interest rates and thereby helps you to pay your EMI on time, which has a positive effect on your Credit Score.</p>

                    <p><strong>2. Debt Clearance:</strong></p>
                    <p>It is necessary that you clear the unnecessary burden of debts you are facing in your life. The ideal way to do it is by not keeping more cards or securing extra loans when not needed.</p>

                    <p><strong>3. Credit History Impact:</strong></p>
                    <p>Maintaining good 'Credit History' is a popular method that can be used in improvisation of your Credit score. It can be done using the following steps given below:
                    </p>

                    <ul>
                        <li class="cards-about__descr">Pay the EMI on any loan that you take on time</li>
                        <li class="cards-about__descr">Prior to seeking a new loan you need to completely repay any existing credit</li>
                        <li class="cards-about__descr">When taking a loan, it always take a long tenure so you need to pay low EMIs</li>
                        <li class="cards-about__descr">Factor that can help improve your Credit History is your credit utilization ratio. Therefore, while paying a loan you need to limit credit usage to the amount sanctioned by your lender. If your limit is exceeded then your Credit Score gets lower and 'Credit History' gets affected.</li>
                    </ul>
                    <!-- <p>Therefore, while paying a loan you need to limit credit usage to the amount sanctioned by your lender. If your limit is exceeded then your Credit Score gets lower and 'Credit History' gets affected. </p> -->
                </div>
                <div class="credit-score-btn">
                    <a href="#cibil-banner-section" class="">
                        <img
                            src=<?php echo esc_url(get_template_directory_uri()) . "/images/get-credit-score-btn.gif" ?>
                            alt="" class="get-credit-score-img" />
                    </a>
                </div>
                <div>
                    <h3 class="wp-block-heading">Benefits of a Good Credit score :</h3>
                    <ul>
                        <li class="cards-about__descr">
                            <strong>Get The Best Credit Card -</strong>A good score may get you the best Credit Cards. Get a feature-rich card and enjoy its benefits.

                        </li>
                        <li class="cards-about__descr">
                            <strong>Quick Loan Approval -</strong>A good score works like an express way for your loan application approval. Banks can approve your application quickly and easily.

                        </li>
                        <li class="cards-about__descr">
                            <strong>Better Interest Rate - </strong>With the backing of a good score, you can bargain for a lower rate of interest on Credit Cards and loans.
                        </li>
                        <li class="cards-about__descr">
                            <strong>More Affordable Loans -</strong> Loans Come With Processing Fees And More You can
                            bargain your way out of these charges with a good Credit score
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="wp-block-heading">Few reasons for you to maintain a Good Credit Score:</h3>
                    <ol class="decimal">
                        <li>
                            <strong>Easy access to a loan with the Lowest Interest
                                Rate:</strong>
                            <p>
                                A significant advantage of having a Good Credit
                                Score is that the chances of you getting a loan from
                                the lender at a minimum interest rate increases. It
                                is because a lender on seeing your Good Credit Score
                                will consider you 'Creditworthy.
                            </p>
                        </li>
                        <li>
                            <strong> Improvement in loan eligibility:</strong>
                            <p>
                                When you have a Good Credit Score it shows the
                                lender that you have a good loan repayment history
                                and therefore you are 'Creditworthy'. A major reason
                                for any financial institution to offer you the Best
                                Loan in India at the lowest interest rate available.
                            </p>
                        </li>
                        <li>
                            <strong>Get the Best Credit Card in India:</strong>
                            <p>Like loans you need to have Good Credit Score to have a greater chance to get the Best Credit India, that offers lifestyle-related benefits such as CASHBACK' and 'REWARD' points. This is because possessing a Good Credit Score represents a reliable 'Credit Behaviour' and shows your 'Creditworthiness' to the lender.</p>
                        </li>
                    </ol>
                </div>
                <div class="credit-score-btn">
                    <a href="#cibil-banner-section" class="">
                        <img
                            src=<?php echo esc_url(get_template_directory_uri()) . "/images/get-credit-score-btn.gif" ?>
                            alt="" class="get-credit-score-img" />
                    </a>
                </div>

                <div>
                    <h3 class="wp-block-heading">Reasons for a Low Credit Score:</h3>
                    <p>
                        Credit score plays a very crucial role to determine your
                        creditworthiness with lenders, as it reflects how likely you are
                        capable to repay borrowed funds. A low Credit score may label
                        you as a high-risk borrower, which can lead your loan
                        application being rejected. It is important to understand the
                        underlying reasons for a low Credit score to maintain a healthy
                        score.
                    </p>
                    <h4 class="wp-block-heading">
                        Here are some common factors that contribute to a low Credit
                        score:
                        </h3>
                        <ol class="decimal">
                            <li>
                                <strong>Delayed Repayment of Loans and Credit Card Dues</strong>
                                <p>
                                    Consistently missing or delaying the repayment of your
                                    EMls for loans or credit card balances can significantly
                                    impact your credit history, lowering your Credit score.
                                </p>
                            </li>
                            <li>
                                <strong>High Credit Utilization</strong>
                                <p>
                                    Using a large portion of your available credit limit
                                    (more than 30%) on a regular basis can signal to lenders
                                    about your financial eligibility. This can harm your
                                    credit score over time.
                                </p>
                            </li>
                            <li>
                                <strong>Unbalanced Loan Mix</strong>
                                <p>
                                    A poor mix of secured and unsecured loans can also
                                    affect your credit score. It's advisable to have a
                                    higher proportion of secured loans (like home loans or
                                    mortgage loans) compared to unsecured loans (such as
                                    personal or business loans), as they are typically seen
                                    as less risky by lenders.
                                </p>
                            </li>
                            <li>
                                <strong>Frequent Hard Inquiries</strong>
                                <p>
                                    When you apply for multiple loans or credit cards in a
                                    short period, lenders make hard inquiries into your
                                    credit report. Each inquiry can lower your credit score,
                                    and various inquiries within a short period can address
                                    desperation for credit, which may make you appear to be
                                    a risky borrower.
                                </p>
                                <p>
                                    Addressing these issues can help you improve your credit
                                    score and increase your chances of loan approval.
                                </p>
                            </li>
                        </ol>

                </div>
                <div class="credit-score-btn">
                    <a href="#cibil-banner-section" class="">
                        <img
                            src=<?php echo esc_url(get_template_directory_uri()) . "/images/get-credit-score-btn.gif" ?>
                            alt="" class="get-credit-score-img" />
                    </a>
                </div>
                <div>
                    <h3 class="wp-block-heading">How do you download a PDF for a credit score check online?</h3>
                    <h4 class="wp-block-heading">
                        To download your Credit report, follow these instructions.
                    </h4>
                    <ul>
                        <li class="cards-about__descr">
                            Go to the Loan Bazaar Credit page dashboard.
                        </li>
                        <li class="cards-about__descr">
                            Click on the option 'Check your Credit score' to access
                            your
                            <strong>credit report online</strong>.
                        </li>
                        <li class="cards-about__descr">
                            Then click on the 'View My Report button.
                        </li>
                        <li class="cards-about__descr">
                            Check your credit reports
                        </li>
                        <li class="cards-about__descr">
                            To save your Credit report to your device, tap on
                            'Download Report.'
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="wp-block-heading">Credit Information Companies in India:</h3>
                    <p>
                        There are four companies in India providing credit
                        information.
                    </p>
                    <ul>
                        <li class="cards-about__descr">
                            Experian Credit Information Company of India Private
                            Limited
                        </li>
                        <li class="cards-about__descr">
                            TransUnion Credit Limited (earlier known as - Credit
                            Information Bureau (India) Limited)
                        </li>
                        <li class="cards-about__descr">CRIF High Mark</li>
                        <li class="cards-about__descr">
                            Equifax Credit Information Services Private Limited
                            (ECIS)
                        </li>
                    </ul>
                </div>
                <div class="credit-score-btn">
                    <a href="#cibil-banner-section" class="">
                        <img
                            src=<?php echo esc_url(get_template_directory_uri()) . "/images/get-credit-score-btn.gif" ?>
                            alt="" class="get-credit-score-img" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php
    // Check rows exists.
    if (have_rows('loan_list_page_faqs')) :
    ?>
        <section class="faq">
            <div class="container">
                <div class="faq__inner">
                    <h2 class="faq__title h2_title">FAQs</h2>
                    <div class="faq__content">
                        <?php
                        // Loop through the rows of data
                        while (have_rows('loan_list_page_faqs')) : the_row();
                            // Get the sub field values
                            $icon = get_sub_field('questions_icon');
                            $question = get_sub_field('quetions');
                            $answer = get_sub_field('answers');
                        ?>
                            <div class="faq__item">
                                <div class="faq__item-top">
                                    <span class="faq__item-icon">
                                        <!-- Insert SVG or any other icon HTML here if needed -->
                                        <?php if ($icon && isset($icon['url'])) : ?>
                                            <img src="<?php echo esc_url($icon['url']); ?>" alt=" " />
                                        <?php endif; ?>

                                    </span>
                                    <div class="faq__item-name">
                                        <?php echo esc_html($question); ?>
                                    </div>
                                </div>
                                <div class="faq__item-descr">
                                    <?php echo $answer; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="applyonline">
        <div class="container">
            <div class="applyonline__inner">
                <div class="applyonline__content">
                    <div class="applyonline__close">
                        <svg class="close-btn" xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                            <path d="M0.94118 0.45305C1.3317 0.0625252 1.96487 0.0625252 2.35539 0.45305L20.0331 18.1307C20.4236 18.5212 20.4236 19.1544 20.0331 19.5449C19.6425 19.9355 19.0094 19.9355 18.6189 19.5449L0.941179 1.86726C0.550655 1.47674 0.550655 0.843574 0.94118 0.45305Z" fill="#040018"></path>
                            <path d="M0.933518 19.5488C0.542994 19.1582 0.542994 18.5251 0.933518 18.1345L18.6112 0.456871C19.0017 0.0663466 19.6349 0.0663471 20.0254 0.456871C20.4159 0.847396 20.4159 1.48056 20.0254 1.87108L2.34773 19.5488C1.95721 19.9393 1.32404 19.9393 0.933518 19.5488Z" fill="#040018"></path>
                        </svg>

                    </div>
                    <div id="cibil-score-container" style="display:none;">
                        <div class="header">Your Experian Credit Score</div>
                        <div class="spedometer-container">
                            <svg class="gauge" viewBox="0 0 300 200"></svg>
                            <div class="score-description">
                                <h2 id="scoreText" class="credit_score">0</h2>
                                <span class="scorecontent">Excellent score, showing timely repayments</span>
                            </div>
                            <div class="color-description">
                                <h3>Score Ranges and Colors</h3>
                                <ul>
                                    <li>
                                        <span class="color-brick" style="background-color: #E82B3F;"></span>
                                        350 - 549
                                    </li>
                                    <li>
                                        <span class="color-brick" style="background-color: #FFD140;"></span>
                                        550 - 649
                                    <li>
                                        <span class="color-brick" style="background-color: #9ACC2D;"></span>
                                        650 - 749
                                    </li>
                                    <li>
                                        <span class="color-brick" style="background-color: #5AAB61;"></span>
                                        750 - 900
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <h4 class="applyonline__title h2_title error_message"></h4>
                    <!-- <h4 class="applyonline__title h2_title credit_score"></h4> -->
                    <a href="" class="btn" id="downloadbutton" style="display:none;">Download PDF</a>

                </div>

            </div>
        </div>


    </section>

</main>

<script src="https://d3js.org/d3.v7.min.js"></script>

<script>
    const width = 600; // Set the width of the gauge
    const height = 300; // Set the height of the gauge
    const radius = Math.min(width, height) / 2; // Calculate radius based on the smaller dimension
    const margin = 5; // Define the margin size between arcs
    var creditscore = 0;

    const svg = d3.select(".gauge")
        .attr("width", width)
        .attr("height", height);

    const arc = d3.arc()
        .innerRadius(radius * 0.6) // Inner radius for the arcs
        .outerRadius(radius * 0.95); // Outer radius for the arcs

    // Define color segments based on score ranges
    const colorRanges = [{
            start: 350,
            end: 549,
            color: "#E82B3F"
        }, // Red for low scores
        {
            start: 550,
            end: 649,
            color: "#FFD140"
        }, // Orange for medium scores
        {
            start: 650,
            end: 749,
            color: "#9ACC2D"
        }, // Green for good scores
        {
            start: 750,
            end: 900,
            color: "#5AAB61"
        } // Dark Green for excellent scores
    ];

    // Create arcs for each color range
    colorRanges.forEach(range => {
        svg.append("path")
            .attr("d", arc
                .startAngle((range.start - 350) / (900 - 350) * Math.PI - Math.PI / 2)
                .endAngle((range.end - 350) / (900 - 350) * Math.PI - Math.PI / 2))
            .attr("transform", `translate(${width / 4}, ${height/2})`) // Center the arcs
            .style("fill", range.color)
            .style("display", "block");
    });

    // Create a blue circle at the starting point of the needle
    svg.append("circle")
        .attr("cx", width / 4)
        .attr("cy", (height / 2) - 10) // Position at the bottom center
        .attr("r", 16) // Radius of the circle
        .style("fill", "blue"); // Set circle color to blue

    // Create the needle (black color)
    const needle = svg.append("polygon")
        .attr("class", "needle")
        .attr("points", "0,-120 10,0 -10,0") // Adjusted length of the needle
        .attr("transform", `translate(${width / 4}, ${(height/2)-10}) rotate(0)`) // Center the needle
        .style("fill", "black"); // Set needle color to black

    function updateSpeedometer(score) {

        const clampedScore = Math.max(350, Math.min(900, score));
        const angle = ((clampedScore - 350) / (900 - 350)) * 180 - 90; // Map score to angle
        console.log('score', score);
        // Update needle rotation
        needle.transition()
            .duration(1000)
            .attr("transform", `translate(${width / 4}, ${(height/2)-10}) rotate(${angle})`);

        // Update score text
        // document.getElementById("scoreText").textContent = `${clampedScore}`;


        // Determine the score message based on the clamped score
        var scoreMessage;
        if (score >= 350 && score < 550) {
            scoreMessage = "Poor score, indicates late payments or defaults.";
        } else if (score >= 550 && score < 650) {
            scoreMessage = "Adequate score, suggests payment difficulties.";
        } else if (score >= 650 && score < 750) {
            scoreMessage = "Good score, on the right track. Loans are possible.";
        } else if (score >= 750 && score <= 900) {
            scoreMessage = "Excellent score, showing timely repayments.";
        } else {
            scoreMessage = "Na/Nh";
        }

        // Insert the score message into the scorecontent span
        jQuery('.scorecontent').text(scoreMessage);
    }

    // Example usage with a sample score
    // const creditScoreVal = 700; // Replace with dynamic value if needed
    updateSpeedometer(creditscore);
</script>



<script>
    document.querySelector('.cibil__otp-get').addEventListener('click', function() {
        const currentOtpItem = document.querySelector('.cibil__otp-item.active');
        const nextOtpItem = currentOtpItem.nextElementSibling;
        const otpSendedMessage = document.querySelector('.cibil__otp-sended');

        if (nextOtpItem && nextOtpItem.classList.contains('cibil__otp-item')) {
            currentOtpItem.classList.remove('active');
            nextOtpItem.classList.add('active');
            otpSendedMessage.classList.add('active');

        }
    });
</script>