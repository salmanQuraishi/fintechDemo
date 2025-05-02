<x-app-layout>
<style>     
  .banksCard img {
    max-width: unset !important;
    height: auto;
  }

  .banksCard .card {
    /* background: #eaf4fe; */
    border-radius: 16px;
    padding: 5px 30px;
    display: flex;
    /* flex-wrap: wrap; */
    justify-content: space-between;
    align-items: center;
  }

  .banksCard .text-area {
    padding: 10px;
  }

  .banksCard .icons {
    display: flex;
    gap: 10px;
    margin-top: 20px;
  }

  .banksCard .icons img {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: white;
    padding: 5px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  }

  .banksCard .blocks {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 12px;
  }

  .banksCard .blocks-image {
    /* width: 100%; */
    max-width: 420px;
    height: auto;
  }

  @media (max-width: 768px) {
    .banksCard .card {
      flex-direction: column;
      text-align: center;
    }

    .banksCard .blocks {
      margin-top: 30px;
    }
  }
  .textcenter{
    text-align: -webkit-center;
  }
  .cardcontainer {
    position: relative;
    background-image: url("images/bg.png");
    background-size: cover;
    padding: 25px;
    border-radius: 11px;
    /* max-width: 380px; */
    width: 100%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  }
  .cardcontainer header,
  .logo {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .cardcontainer .logo img {
    width: 48px;
    margin-right: 10px;
  }
  .cardcontainer h5 {
    color: #fff;
  }
  .cardcontainer header .chip {
    width: 60px;
  }
  .cardcontainer h6 {
    color: #fff;
    font-size: 10px;
    font-weight: 400;
  }
  .cardcontainer h5.number {
    margin-top: 4px;
    font-size: 18px;
    letter-spacing: 1px;
  }
  .cardcontainer .name {
    margin-top: 20px;
  }
  .cardcontainer .card-details {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
  } 
</style>

    @if (auth()->user()->kyc_verified === "verified")
      <main class="w-full xl:px-12 px-6 pb-6 xl:pb-12  sm:pt-[156px] pt-[100px]">
    @else
    <main class="w-full xl:px-12 px-6 pb-6 xl:pb-12  sm:pt-[110px] pt-[100px]">
      <x-input-info :messages="['Your KYC is still unverified. Please complete the verification process.']" /> 
    @endif


    <div class="block rounded-md bg-[#FDF9E9] px-4 text-sm font-semibold leading-[22px] text-warning-300 dark:bg-darkblack-600 mb-2">
      <div class="flex flex-row py-3 gap-3">
        <div class="flex h-[93] w-1 bg-warning-300 rounded-lg"></div>
        <div class="flex-1">
            <p class="text-bgray-800 dark:text-white text-[#9AA2B1] pl-3 lg:text-base text-xs lg:leading-7">
              Live payments and Settlements
              Submit a few KYC details to start accepting payments and receive settlement in your account  
            </p>
        </div>
        <a href="{{route('business.overview')}}" class="flex items-center justify-center h-10 bg-success-50 px-4 py-1.5 text-sm font-semibold leading-[22px] text-success-400 dark:bg-darkblack-500">Submit Kyc</a>
      </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
          <!-- total widget-->
          <div class="w-full mb-[24px]">
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-[24px]">
              <div class="p-5 rounded-lg bg-white dark:bg-darkblack-600">
                <div class="flex justify-between items-center mb-5">
                  <div class="flex space-x-[7px] items-center">
                    <div class="icon">
                      <span> 
                        <img src="{{ asset('/') }}assets/images/icons/total-earn.svg" alt="icon">
                      </span>
                    </div>
                    <span class="text-lg text-bgray-900 dark:text-white font-semibold">Fund</span>
                  </div>
                  <div>
                    <img src="{{ asset('/') }}assets/images/avatar/members-2.png" alt="members">
                  </div>
                </div>
                <div class="flex justify-between items-end">
                  <div class="flex-1">
                    <p class="text-bgray-900 dark:text-white font-bold text-3xl leading-[48px]">
                      {{ Number::currency(auth()->user()->fund,'INR') }}
                    </p>
                    <div class="flex items-center space-x-1">
                      <span>
                        <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.4318 0.522827L12.4446 0.522827L8.55575 0.522827L7.56859 0.522827C6.28227 0.522827 5.48082 1.91818 6.12896 3.02928L9.06056 8.05489C9.7037 9.1574 11.2967 9.1574 11.9398 8.05489L14.8714 3.02928C15.5196 1.91818 14.7181 0.522828 13.4318 0.522827Z" fill="#22C55E"></path>
                          <path opacity="0.4" d="M2.16878 13.0485L3.15594 13.0485L7.04483 13.0485L8.03199 13.0485C9.31831 13.0485 10.1198 11.6531 9.47163 10.542L6.54002 5.5164C5.89689 4.41389 4.30389 4.41389 3.66076 5.5164L0.729153 10.542C0.0810147 11.6531 0.882466 13.0485 2.16878 13.0485Z" fill="#22C55E"></path>
                        </svg>
                      </span>
                      <span class="text-success-300 text-sm font-medium">
                        + 3.5%
                      </span>
                      <span class="text-bgray-700 dark:text-bgray-50 text-sm font-medium">
                        from last week
                      </span>
                    </div>
                  </div>
                  <div class="w-[106px]">
                    <canvas id="totalEarn" height="68"></canvas>
                  </div>
                </div>
              </div>
              <div class="p-5 rounded-lg bg-white  dark:bg-darkblack-600">
                <div class="flex justify-between items-center mb-5">
                  <div class="flex space-x-[7px] items-center">
                    <div class="icon">
                      <span>
                        <img src="{{ asset('/') }}assets/images/icons/total-earn.svg" alt="icon">
                      </span>
                    </div>
                    <span class="text-lg text-bgray-900 dark:text-white  font-semibold">Wallet</span>
                  </div>
                  <div>
                    <img src="{{ asset('/') }}assets/images/avatar/members-2.png" alt="members">
                  </div>
                </div>
                <div class="flex justify-between items-end">
                  <div class="flex-1">
                    <p class="text-bgray-900 dark:text-white font-bold text-3xl leading-[48px]">
                      {{ Number::currency(auth()->user()->wallet,'INR') }}
                    </p>
                    <div class="flex items-center space-x-1">
                      <span>
                        <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.4318 0.522827L12.4446 0.522827L8.55575 0.522827L7.56859 0.522827C6.28227 0.522827 5.48082 1.91818 6.12896 3.02928L9.06056 8.05489C9.7037 9.1574 11.2967 9.1574 11.9398 8.05489L14.8714 3.02928C15.5196 1.91818 14.7181 0.522828 13.4318 0.522827Z" fill="#22C55E"></path>
                          <path opacity="0.4" d="M2.16878 13.0485L3.15594 13.0485L7.04483 13.0485L8.03199 13.0485C9.31831 13.0485 10.1198 11.6531 9.47163 10.542L6.54002 5.5164C5.89689 4.41389 4.30389 4.41389 3.66076 5.5164L0.729153 10.542C0.0810147 11.6531 0.882466 13.0485 2.16878 13.0485Z" fill="#22C55E"></path>
                        </svg>
                      </span>
                      <span class="text-success-300 text-sm font-medium">
                        + 3.5%
                      </span>
                      <span class="text-bgray-700 dark:text-bgray-50 text-sm font-medium">
                        from last week
                      </span>
                    </div>
                  </div>
                  <div class="w-[106px]">
                    <canvas id="totalSpending" height="68"></canvas>
                  </div>
                </div>
              </div>
              <div class="p-5 rounded-lg bg-white dark:bg-darkblack-600">
                <div class="flex justify-between items-center mb-5">
                  <div class="flex space-x-[7px] items-center">
                    <div class="icon">
                      <span>
                        <img src="{{ asset('/') }}assets/images/icons/total-earn.svg" alt="icon">
                      </span>
                    </div>
                    <span class="text-lg text-bgray-900 dark:text-white font-semibold">Spending Goal</span>
                  </div>
                  <div>
                    <img src="{{ asset('/') }}assets/images/avatar/members-2.png" alt="members">
                  </div>
                </div>
                <div class="flex justify-between items-end">
                  <div class="flex-1">
                    <p class="text-bgray-900 dark:text-white font-bold text-3xl leading-[48px]">
                      {{ Number::currency(0,'INR') }}
                    </p>
                    <div class="flex items-center space-x-1">
                      <span>
                        <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.4318 0.522827L12.4446 0.522827L8.55575 0.522827L7.56859 0.522827C6.28227 0.522827 5.48082 1.91818 6.12896 3.02928L9.06056 8.05489C9.7037 9.1574 11.2967 9.1574 11.9398 8.05489L14.8714 3.02928C15.5196 1.91818 14.7181 0.522828 13.4318 0.522827Z" fill="#22C55E"></path>
                          <path opacity="0.4" d="M2.16878 13.0485L3.15594 13.0485L7.04483 13.0485L8.03199 13.0485C9.31831 13.0485 10.1198 11.6531 9.47163 10.542L6.54002 5.5164C5.89689 4.41389 4.30389 4.41389 3.66076 5.5164L0.729153 10.542C0.0810147 11.6531 0.882466 13.0485 2.16878 13.0485Z" fill="#22C55E"></path>
                        </svg>
                      </span>
                      <span class="text-success-300 text-sm font-medium">
                        + 3.5%
                      </span>
                      <span class="text-bgray-700 dark:text-bgray-50 text-sm font-medium">
                        from last week
                      </span>
                    </div>
                  </div>
                  <div class="w-[106px]">
                    <canvas id="totalGoal" height="68"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>
        
      </div>

      <div class="grid lg:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-4 gap-3 lg:gap-4 xl:gap-6">
        
        <div class="bg-white dark:bg-darkblack-600 rounded-lg p-6">
          <div class="shrink-0 textcenter">
            <img src="assets/images/integrations/slack.svg" alt="Stack Overflow">
          </div>
          <div class="text-center">
              <span class="text-lg text-bgray-600 dark:text-bgray-50 text-center">My Payouts</span>
          </div>
        </div>

        <div class="bg-white dark:bg-darkblack-600 rounded-lg p-6">
          <div class="shrink-0 textcenter">
            <img src="assets/images/integrations/slack.svg" alt="Stack Overflow">
          </div>
          <div class="text-center">
              <span class="text-lg text-bgray-600 dark:text-bgray-50 text-center">Credit Card Bill Pay</span>
          </div>
        </div>
        
        <div class="bg-white dark:bg-darkblack-600 rounded-lg p-6">
          <div class="shrink-0 textcenter">
            <img src="assets/images/integrations/slack.svg" alt="Stack Overflow">
          </div>
          <div class="text-center">
              <span class="text-lg text-bgray-600 dark:text-bgray-50 text-center">Expense Cards</span>
          </div>
        </div>
        
        <div class="bg-white dark:bg-darkblack-600 rounded-lg p-6">
          <div class="shrink-0 textcenter">
            <img src="assets/images/integrations/slack.svg" alt="Stack Overflow">
          </div>
          <div class="text-center">
              <span class="text-lg text-bgray-600 dark:text-bgray-50 text-center">Gift Cards</span>
          </div>
        </div>
        
        
        <div class="bg-white dark:bg-darkblack-600 rounded-lg p-6">
          <div class="shrink-0 textcenter">
            <img src="assets/images/integrations/slack.svg" alt="Stack Overflow">
          </div>
          <div class="text-center">
              <span class="text-lg text-bgray-600 dark:text-bgray-50 text-center">Bill Payments</span>
          </div>
        </div>

        <div class="bg-white dark:bg-darkblack-600 rounded-lg p-6">
          <div class="shrink-0 textcenter">
            <img src="assets/images/integrations/slack.svg" alt="Stack Overflow">
          </div>
          <div class="text-center">
              <span class="text-lg text-bgray-600 dark:text-bgray-50 text-center">Contact Book</span>
          </div>
        </div>
        
        <div class="bg-white dark:bg-darkblack-600 rounded-lg p-6">
          <div class="shrink-0 textcenter">
            <img src="assets/images/integrations/slack.svg" alt="Stack Overflow">
          </div>
          <div class="text-center">
              <span class="text-lg text-bgray-600 dark:text-bgray-50 text-center">Developer APIs</span>
          </div>
        </div>
        
        <div class="bg-white dark:bg-darkblack-600 rounded-lg p-6">
          <div class="shrink-0 textcenter">
            <img src="assets/images/integrations/slack.svg" alt="Stack Overflow">
          </div>
          <div class="text-center">
              <span class="text-lg text-bgray-600 dark:text-bgray-50 text-center">Loans</span>
          </div>
        </div>
        
      </div>
        
    </main>

    @include('modal.showbanks')
    

    @push('scripts')

      <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>
      <script src="{{ asset('/') }}assets/js/aos.js"></script>
      <script src="{{ asset('/') }}assets/js/slick.min.js"></script>
      <script>
        AOS.init();
      </script>
      <script src="{{ asset('/') }}assets/js/quill.min.js"></script>
      <script src="{{ asset('/') }}assets/js/main.js"></script>
      <script src="{{ asset('/') }}assets/js/chart.js"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
            const offcanvas = document.querySelector(".offcanvas");
            const backdrop = document.querySelector(".offcanvas-backdrop");
            const toggleButton = document.querySelector(".toggle-menu"); // Button to open the menu
            const closeButton = document.querySelector(".btn-close");

            // Open the offcanvas menu and show backdrop
            toggleButton.addEventListener("click", function () {
                offcanvas.classList.add("show");
                backdrop.classList.add("show");
            });

            // Close the offcanvas menu and hide backdrop
            closeButton.addEventListener("click", function () {
                offcanvas.classList.remove("show");
                backdrop.classList.remove("show");
            });

            // Close the offcanvas menu when clicking the backdrop
            backdrop.addEventListener("click", function () {
                offcanvas.classList.remove("show");
                backdrop.classList.remove("show");
            });
        });
    </script>

      <script>
      $(".card-slider").slick({
          dots: true,
          infinite: true,
          autoplay: true,
          speed: 500,
          fade: true,
          cssEase: "linear",
          arrows: false,
        });
        function totalEarn() {
          const ctx_bids = document.getElementById("totalEarn").getContext("2d");
          const bitsMonth = [
            "Jan",
            "Feb",
            "Mar",
            "Afril",
            "May",
            "Jan",
            "Feb",
            "Mar",
            "Afril",
            "May",
            "Feb",
            "Mar",
            "Afril",
            "May",
          ];
          const bitsData = [
            0, 10, 0, 65, 0, 25, 0, 35, 20, 100, 40, 75, 50, 85, 60,
          ];
          const totalEarn = new Chart(ctx_bids, {
            type: "line",
            data: {
              labels: bitsMonth,
              datasets: [
                {
                  label: "Visitor",
                  data: bitsData,
                  backgroundColor: () => {
                    const chart = document
                      .getElementById("totalEarn")
                      .getContext("2d");
                    const gradient = chart.createLinearGradient(0, 0, 0, 450);
                    gradient.addColorStop(0, "rgba(34, 197, 94,0.41)");
                    gradient.addColorStop(0.2, "rgba(255, 255, 255, 0)");

                    return gradient;
                  },
                  borderColor: "#22C55E",
                  pointRadius: 0,
                  pointBackgroundColor: "#fff",
                  pointBorderColor: "#22C55E",
                  borderWidth: 1,
                  fill: true,
                  fillColor: "#fff",
                  tension: 0.4,
                },
              ],
            },
            options: {
              layout: {
                padding: {
                  bottom: -20,
                },
              },
              maintainAspectRatio: false,
              responsive: true,
              scales: {
                x: {
                  grid: {
                    display: false,
                    drawBorder: false,
                  },
                  ticks: {
                    display: false,
                  },
                },
                y: {
                  grid: {
                    display: false,
                    drawBorder: false,
                  },
                  ticks: {
                    display: false,
                  },
                },
              },

              plugins: {
                legend: {
                  position: "top",
                  display: false,
                },
                title: {
                  display: false,
                  text: "Visitor: 2k",
                },
                tooltip: {
                  enabled: false,
                },
              },
            },
          });
        }
        totalEarn();
        function totalSpendingChart() {
          let ctx_bids = document
            .getElementById("totalSpending")
            .getContext("2d");
          let bitsMonth = [
            "Jan",
            "Feb",
            "Mar",
            "Afril",
            "May",
            "Jan",
            "Feb",
            "Mar",
            "Afril",
            "May",
            "Feb",
            "Mar",
            "Afril",
            "May",
          ];
          let bitsData = [
            0, 10, 0, 65, 0, 25, 0, 35, 20, 100, 40, 75, 50, 85, 60,
          ];
          let totalEarn = new Chart(ctx_bids, {
            type: "line",
            data: {
              labels: bitsMonth,
              datasets: [
                {
                  label: "Visitor",
                  data: bitsData,
                  backgroundColor: () => {
                    const chart = document
                      .getElementById("totalEarn")
                      .getContext("2d");
                    const gradient = chart.createLinearGradient(0, 0, 0, 450);
                    gradient.addColorStop(0, "rgba(34, 197, 94,0.41)");
                    gradient.addColorStop(0.2, "rgba(255, 255, 255, 0)");

                    return gradient;
                  },
                  borderColor: "#22C55E",
                  pointRadius: 0,
                  pointBackgroundColor: "#fff",
                  pointBorderColor: "#22C55E",
                  borderWidth: 1,
                  fill: true,
                  fillColor: "#fff",
                  tension: 0.4,
                },
              ],
            },
            options: {
              layout: {
                padding: {
                  bottom: -20,
                },
              },
              maintainAspectRatio: false,
              responsive: true,
              scales: {
                x: {
                  grid: {
                    display: false,
                    drawBorder: false,
                  },
                  ticks: {
                    display: false,
                  },
                },
                y: {
                  grid: {
                    display: false,
                    drawBorder: false,
                  },
                  ticks: {
                    display: false,
                  },
                },
              },

              plugins: {
                legend: {
                  position: "top",
                  display: false,
                },
                title: {
                  display: false,
                  text: "Visitor: 2k",
                },
                tooltip: {
                  enabled: false,
                },
              },
            },
          });
        }
        totalSpendingChart();
        function totalGoal() {
          let ctx_bids = document.getElementById("totalGoal").getContext("2d");
          let bitsMonth = [
            "Jan",
            "Feb",
            "Mar",
            "Afril",
            "May",
            "Jan",
            "Feb",
            "Mar",
            "Afril",
            "May",
            "Feb",
            "Mar",
            "Afril",
            "May",
          ];
          let bitsData = [
            0, 10, 0, 65, 0, 25, 0, 35, 20, 100, 40, 75, 50, 85, 60,
          ];
          let totalEarn = new Chart(ctx_bids, {
            type: "line",
            data: {
              labels: bitsMonth,
              datasets: [
                {
                  label: "Visitor",
                  data: bitsData,
                  backgroundColor: () => {
                    const chart = document
                      .getElementById("totalGoal")
                      .getContext("2d");
                    const gradient = chart.createLinearGradient(0, 0, 0, 450);
                    gradient.addColorStop(0, "rgba(34, 197, 94,0.41)");
                    gradient.addColorStop(0.2, "rgba(255, 255, 255, 0)");

                    return gradient;
                  },
                  borderColor: "#22C55E",
                  pointRadius: 0,
                  pointBackgroundColor: "#fff",
                  pointBorderColor: "#22C55E",
                  borderWidth: 1,
                  fill: true,
                  fillColor: "#fff",
                  tension: 0.4,
                },
              ],
            },
            options: {
              layout: {
                padding: {
                  bottom: -20,
                },
              },
              maintainAspectRatio: false,
              responsive: true,
              scales: {
                x: {
                  grid: {
                    display: false,
                    drawBorder: false,
                  },
                  ticks: {
                    display: false,
                  },
                },
                y: {
                  grid: {
                    display: false,
                    drawBorder: false,
                  },
                  ticks: {
                    display: false,
                  },
                },
              },

              plugins: {
                legend: {
                  position: "top",
                  display: false,
                },
                title: {
                  display: false,
                  text: "Visitor: 2k",
                },
                tooltip: {
                  enabled: false,
                },
              },
            },
          });
        }
        totalGoal();


        let revenueFlowElement = document
                .getElementById("revenueFlow")
                .getContext("2d");
        let month = [
          "Jan",
          "Feb",
          "Mar",
          "April",
          "May",
          "Jun",
          "July",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ];
        let dataSetsLight = [
          {
            label: "My First Dataset",
            data: [1, 5, 2, 2, 6, 7, 8, 7, 3, 4, 1, 3],
            backgroundColor: [
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(250, 204, 21, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
            ],
            borderWidth: 0,
            borderRadius: 5,
          },
          {
            label: "My First Dataset 2",
            data: [5, 2, 4, 2, 5, 8, 3, 7, 3, 4, 1, 3],
            backgroundColor: [
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(255, 120, 75, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
            ],
            borderWidth: 0,
            borderRadius: 5,
          },
          {
            label: "My First Dataset 3",
            data: [2, 5, 3, 2, 5, 6, 9, 7, 3, 4, 1, 3],
            backgroundColor: [
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(74, 222, 128, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
              "rgba(237, 242, 247, 1)",
            ],
            borderWidth: 0,
            borderRadius: 5,
          },
        ];
        let dataSetsDark = [
          {
            label: "My First Dataset",
            data: [1, 5, 2, 2, 6, 7, 8, 7, 3, 4, 1, 3],
            backgroundColor: [
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(250, 204, 21, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
            ],
            borderWidth: 0,
            borderRadius: 5,
          },
          {
            label: "My First Dataset 2",
            data: [5, 2, 4, 2, 5, 8, 3, 7, 3, 4, 1, 3],
            backgroundColor: [
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(255, 120, 75, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
            ],
            borderWidth: 0,
            borderRadius: 5,
          },
          {
            label: "My First Dataset 3",
            data: [2, 5, 3, 2, 5, 6, 9, 7, 3, 4, 1, 3],
            backgroundColor: [
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(74, 222, 128, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
              "rgba(42, 49, 60, 1)",
            ],
            borderWidth: 0,
            borderRadius: 5,
          },
        ]
        let revenueFlow = new Chart(revenueFlowElement, {
          type: "bar",
          data: {
            labels: month,
            datasets: dataSetsLight,
          },
          options: {
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true,
                grid: {
                  color: "rgb(243 ,246, 255 ,1)",
                },
                gridLines: {
                  zeroLineColor: "transparent",
                },
                ticks: {
                  callback(value) {
                    return `${value}% `;
                  },
                },
              },
              x: {
                grid: {
                  color: "rgb(243 ,246, 255 ,1)",
                },
                gridLines: {
                  zeroLineColor: "transparent",
                },
              },
            },
            plugins: {
              legend: {
                display: false,
              },
            },
            x: {
              stacked: true,

            },
            y: {
              stacked: true,
            },
          },
        });
        //pie chart
        let pieChart = document.getElementById("pie_chart").getContext("2d");

        const data = {
          labels: [10, 20, 30],
          datasets: [
            {
              label: "My First Dataset",
              data: [15, 20, 35, 40],
              backgroundColor: ["#1A202C", "#61C660", "#F8CC4B", "#EDF2F7"],
              borderColor: ["#ffffff", "#ffffff", "#ffffff", "#1A202C"],
              hoverOffset: 18,
              borderWidth: 0,
            },
          ],
        };
        const customDatalabels = {
          id: "customDatalabels",
          afterDatasetsDraw(chart, args, pluginOptions) {
            const {
              ctx,
              data,
              chartArea: { top, bottom, left, right, width, height },
            } = chart;
            ctx.save();
            data.datasets[0].data.forEach((datapoint, index) => {
              const { x, y } = chart
                      .getDatasetMeta(0)
                      .data[index].tooltipPosition();
              ctx.font = "bold 12px sans-serif";
              ctx.fillStyle = data.datasets[0].borderColor[index];
              ctx.textAlign = "center";
              ctx.textBaseline = "middle";
              ctx.fillText(`${datapoint}%`, x, y);
            });
          },
        };
        const config = {
          type: "doughnut",
          data,
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 10,
                top: 10,
                bottom: 10,
              },
            },
            plugins: {
              legend: {
                display: false,
              },
            },
          },
          plugins: [customDatalabels],
        };

        let pieChartConfiig = new Chart(pieChart, config);

        //chart dark mode
        let themeToggleSwitch = document.getElementById('theme-toggle');

        //onclick
        if(themeToggleSwitch){
          themeToggleSwitch.addEventListener('click', function() {
            if(document.documentElement.classList[0]==='dark' || localStorage.theme === 'dark'){
              revenueFlow.data.datasets = dataSetsDark;
              revenueFlow.options.scales.y.ticks.color = 'white';
              revenueFlow.options.scales.x.ticks.color = 'white';
              revenueFlow.options.scales.x.grid.color = '#222429';
              revenueFlow.options.scales.y.grid.color = '#222429';
              revenueFlow.update();
            }else{
              revenueFlow.data.datasets = dataSetsLight;
              revenueFlow.options.scales.y.ticks.color = 'black';
              revenueFlow.options.scales.x.ticks.color = 'black';
              revenueFlow.options.scales.x.grid.color = 'rgb(243 ,246, 255 ,1)';
              revenueFlow.options.scales.y.grid.color = 'rgb(243 ,246, 255 ,1)';
              revenueFlow.update();
            }
          
          });
          
        }


        //initial load
        if (localStorage.theme === 'dark' || (window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          revenueFlow.data.datasets=dataSetsDark;
          revenueFlow.options.scales.y.ticks.color='white';
          revenueFlow.options.scales.x.ticks.color='white';
          revenueFlow.options.scales.x.grid.color='#222429';
          revenueFlow.options.scales.y.grid.color='#222429';

        } else {
          revenueFlow.data.datasets=dataSetsLight;
          revenueFlow.options.scales.y.ticks.color='black';
          revenueFlow.options.scales.x.ticks.color='black';
          revenueFlow.options.scales.x.grid.color='rgb(243 ,246, 255 ,1)';
          revenueFlow.options.scales.y.grid.color='rgb(243 ,246, 255 ,1)';
        }
        revenueFlow.update();
      </script>

    @endpush

</x-app-layout>
