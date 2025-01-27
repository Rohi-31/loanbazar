<section class="calculator">
  <div class="container">
    <div class="calculator__inner">
      <h2 class="calculator__title title h2_title">EMI Calculator</h2>
      <div class="calculator__selector">
        <button class="calculator__selector-item active" id="homeLoan">
          Home Loan
        </button>
        <button class="calculator__selector-item" id="personalLoan">Personal Loan</button>
        <button class="calculator__selector-item" id="mortgageLoan">Mortgage Loan</button>
        <button class="calculator__selector-item" id="businessLoan">Business Loan</button>
      </div>
      <div class="calculator__content" id="calculator_content">
        <div class="calculator__left" id="calculator__left">
          <div class="calculator__left-item">
            <div class="calculator__left-top">
              <p class="calculator__left-name">Loan Amount</p>
              <div class="calculator__left-block">
                <p class="calculator__left-ico">₹</p>
                <p class="calculator__left-descr" id="loanAmountValue"><input type="text" class="cal_num_field" min="0" max="50000000" name="loanAmount" id="loanAValue" value="5000000"></p>
              </div>
            </div>
            <div class="calculator__left-content">
              <input type="range" id="loanAmount" class="calculator__left-range" min="0" max="50000000" value="5000000" step="1" />
              <p id="loanAmountRange" class="range-display"></p>
              <div id="loanAmountScale" class="range-scale"></div>
            </div>
          </div>
          <div class="calculator__left-item">
            <div class="calculator__left-top">
              <p class="calculator__left-name">Rate of Interest</p>
              <div class="calculator__left-block">
                <p class="calculator__left-ico">%</p>
                <p class="calculator__left-descr" id="interestRateValue"><input type="number" class="cal_num_field" name="loanrRate" min="7" max="13" id="loanRateValue" value="7"></p>
              </div>
            </div>
            <div class="calculator__left-content">
              <input type="range" id="interestRate" class="calculator__left-range" min="7" max="13" value="7" step="0.1" />
              <p id="interestRateRange" class="range-display"></p>
              <div id="interestRateScale" class="range-scale"></div>

            </div>
          </div>
          <div class="calculator__left-item">
            <div class="calculator__left-top">
              <p class="calculator__left-name">Loan Tenure (Years)</p>
              <div class="calculator__left-block">
                <p class="calculator__left-ico">Years</p>
                <p class="calculator__left-descr" id="loanTenureValue"><input type="number" class="cal_num_field" name="loanTenure" min="5" max="30" id="loanTenValue" value="5"></p>
              </div>
            </div>
            <div class="calculator__left-content">
              <input type="range" id="loanTenure" class="calculator__left-range" min="5" max="30" value="5" step="1" />
              <p id="loanTenureRange" class="range-display"></p>
              <div id="loanTenureScale" class="range-scale"></div>

            </div>
          </div>
        </div>
        <div class="calculator__right">
          <div class="calculator__right-block">
            <div class="calculator__right-item">
              <p class="calculator__right-name">Monthly EMI</p>
              <p class="calculator__right-descr">₹ <span id="monthlyEMI">21,617</span></p>
            </div>
            <div class="calculator__right-item">
              <p class="calculator__right-name">Principal Amount</p>
              <p class="calculator__right-descr">
                ₹ <span id="principalAmount">25,000,000</span>
              </p>
            </div>
            <div class="calculator__right-item">
              <p class="calculator__right-name">Interest Amount</p>
              <p class="calculator__right-descr">
                ₹ <span id="interestAmount">23,000,000</span>
              </p>
            </div>
            <div class="calculator__right-item">
              <p class="calculator__right-name">Total Amount Payble</p>
              <p class="calculator__right-descr">
                ₹ <span id="totalAmountPayable">47,000,000</span>
              </p>
            </div>
          </div>
          <div class="calculator__right-graph">
            <div class="calculator__graph">
              <canvas id="donutChart"></canvas>
              <!--<svg xmlns="http://www.w3.org/2000/svg" width="232" height="232" viewBox="0 0 232 232" fill="none">
                                    <circle cx="115.789" cy="115.789" r="115.789" fill="#0070E0" />
                                    <path d="M115.789 0C100.034 -1.87869e-07 84.4458 3.21499 69.977 9.4482C55.5082 15.6814 42.4635 24.8017 31.6415 36.2509C20.8195 47.7001 12.4477 61.2373 7.03865 76.0339C1.62956 90.8306 -0.703088 106.575 0.18349 122.305C1.07007 138.034 5.15722 153.417 12.1948 167.512C19.2323 181.607 29.0723 194.118 41.1123 204.279C53.1524 214.439 67.1392 222.036 82.2168 226.604C97.2945 231.172 113.146 232.615 128.8 230.844L115.789 115.789L115.789 0Z" fill="#FFD140" />
                                    <circle cx="115.789" cy="115.789" r="57.1522" fill="white" />
                                </svg> -->
            </div>
            <div class="calculator__graph-block">
              <div class="calculator__graph-item">
                <span class="calculator__graph-color"></span>
                <p class="calculator__graph-descr">Interest Amount</p>
              </div>
              <div class="calculator__graph-item">
                <span class="calculator__graph-color"></span>
                <p class="calculator__graph-descr">Principal Amount</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>