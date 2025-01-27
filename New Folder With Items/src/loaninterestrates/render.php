<?php
// Get the featured image URL
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$green_roi_maximum = get_field('green_roi_maximum');
$orange_roi_maximum = get_field('orange_roi_maximum');
$description = get_field('description');
$understanding_of_loan_interest_rate = get_field('understanding_of_loan_interest_rate');
$page_title = the_title();
$loan_type = get_field('loan_type');
if ($loan_type === 'Home Loan') {
    $loan_type = 'home_loan_int_rate';
} elseif ($loan_type === 'Personal Loan') {
    $loan_type = 'person_loan_int_rate';
} elseif ($loan_type === 'Business Loan') {
    $loan_type = 'business_ln_int_rate';
} elseif ($loan_type === 'Mortgage Loan') {
    $loan_type = 'mortag_loan_int_rate';
}




// Format current date
$current_date = date('jS F Y');
?>
<main class="main loan-rates-page">
    <div class="hero-banner " style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
        <div class="hero-content">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="current-date">Updated on <?php echo $current_date; ?></div>
        </div>
    </div>
    <section class="section-two">
        <div class="container">
            <?php if ($description):
                echo wp_kses_post($description);
            endif; ?>

        </div>
    </section>
    <section class="section-three">
        <div class="container">
            <?php
            // Get all posts of type 'home_loan_int_rate'
            $args = array(
                'post_type' => $loan_type,  // Changed from hardcoded 'home_loan_int_rate'
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                // Create array to store posts by color
                $color_groups = array(
                    'green' => array(),
                    'orange' => array(),
                    'red' => array()
                );

                // Group posts by color based on ROI
                while ($query->have_posts()) {
                    $query->the_post();
                    $roi = floatval(get_field('roi'));
                    $lender = get_field('lender');

                    // Determine color based on configurable ROI ranges
                    if ($roi <= $green_roi_maximum) {
                        $color = 'green';
                    } elseif ($roi > $green_roi_maximum && $roi <= $orange_roi_maximum) {
                        $color = 'orange';
                    } elseif ($roi > $orange_roi_maximum) {
                        $color = 'red';
                    }

                    $color_groups[$color][] = array(
                        'lender' => $lender,
                        'roi' => $roi,
                    );
                }

                // Sort each color group by ROI
                foreach ($color_groups as &$group) {
                    usort($group, function ($a, $b) {
                        return $a['roi'] <=> $b['roi'];
                    });
                }
            ?>
                <!-- Color Meter -->
                <!-- <div id="colorMeter" style="margin-bottom: 30px;"></div> -->

                <!-- Color Meter -->
                <!-- pie chart -->
                <div id="color-pie-chart">
                    <div class="pie_chart">
                        <div class="text text-low">Low</div>
                        <div class="text text-med">Medium</div>
                        <div class="text text-high">High</div>
                        <div class="pie one">
                            <div class="slice">
                                <!-- <div class="text">Low</div> -->
                            </div>
                        </div>
                        <div class="pie two">
                            <div class="slice">
                                <!-- <div class="text">medium</div> -->
                            </div>
                        </div>
                        <div class="pie three">
                            <div class="slice">
                                <!-- <div class="text">high</div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- pie chart -->


                <!-- Interest Rates Table -->
                <div id="interest-rates-table-container">
                    <p class="mobile_text">* Onwards</p>
                    <table class="interest-rates-table" id="ratesTable">
                        <thead>
                            <tr class="desktop-content-header">
                                <th>Lender</th>
                                <th>Interest Rate (ROI)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $colorMap = [
                            //     'red' => '#e06666',
                            //     'green' => '#93c47d',
                            //     'orange' => '#ffe599'
                            // ];
                            $colorMap = [
                                'red' => '#e48c1b',
                                'green' => '#5AAB61',
                                'orange' => '#FFD140'
                            ];



                            foreach ($color_groups as $color => $entries) {
                                foreach ($entries as $entry) {
                            ?>
                                    <tr class="rate-row <?php echo esc_attr($color); ?>" data-color="<?php echo esc_attr($colorMap[$color]); ?>">
                                        <td class="<?php echo esc_attr($color); ?> lender-name"><?php echo esc_html($entry['lender']); ?></td>
                                        <td class="<?php echo esc_attr($color); ?> roi-rate"><?php echo esc_html($entry['roi']); ?>%<span class="desktop-roi-content"> Onwards</span> <span class="mobile-roi-content">*</span></td>
                                        <td class="compare-button">
                                            <a href="#" class="compare__content-btn btn desktop-content claim-btn" data-lender="<?php echo esc_attr($entry['lender']); ?>" data-roi="<?php echo esc_attr($entry['roi']); ?>">Claim</a>
                                            <a href="#" class="compare__content-btn btn mobile-content claim-btn" data-lender="<?php echo esc_attr($entry['lender']); ?>" data-roi="<?php echo esc_attr($entry['roi']); ?>">Claim</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>



            <?php
                wp_reset_postdata();
            }
            ?>
        </div>
    </section>

    <section class="section-four">
        <div class="container">
            <?php if ($understanding_of_loan_interest_rate):
                echo wp_kses_post($understanding_of_loan_interest_rate);
            endif; ?>

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
    <?php
    // Loan Interest Form Start
    // Define the block to be rendered
    $loan_interest_form_block = [
        'blockName' => 'ourblocktheme/loaninterestform',
        'attrs'     => [
            'content' => 'This is a Loan Interest Form block.',
        ],
    ];

    // Render the block
    $block_content = render_block($loan_interest_form_block);

    // Check if the block was rendered successfully
    if (empty($block_content)) {
        echo '<div class="my-custom-block">Failed to render nested block</div>';
    }

    // Return the content, including the rendered block
    echo '<div class="loan_interest_form" id="loan_interest_form_block">' . $block_content . '</div>';
    // EMI Calculator END
    ?>

</main>

<!-- D3.js Script -- >
<script src="https://d3js.org/d3.v7.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to set up pie chart size based on window size
    function getChartDimensions() {
        const maxWidth = 420;
        const maxHeight = 210;

        const containerWidth = Math.min(document.querySelector("#colorMeter").offsetWidth, maxWidth);
        const containerHeight = Math.min(containerWidth * 0.5, maxHeight); // Height is half of the width, but maxHeight

        const outerRadius = containerHeight - 15; // Outer radius is the height minus 15px

        return { width: containerWidth, height: containerHeight, outerRadius };
    }

    // Function to draw the pie chart
    function drawPieChart() {
        const { width, height, outerRadius } = getChartDimensions();
        const innerRadius = 0;

        const segmentData = [
            { color: "#5AAB61", label: "Low", category: "green" },
            { color: "#FFD140", label: "Medium", category: "orange" },
            { color: "#e48c1b", label: "High", category: "red" }
        ];

        // Clear any existing SVG
        const svgContainer = d3.select("#colorMeter").selectAll("*").remove();
        
        const svg = d3.select("#colorMeter")
            .append("svg")
            .attr("width", width)
            .attr("height", height)
            .append("g")
            .attr("transform", `translate(${width / 2}, ${height})`); // Center the pie chart

        // Define the shadow filter (no changes here)
        var defs = svg.append("defs");

        var filter = defs.append("filter")
            .attr("id", "innerShadow");

        filter.append("feGaussianBlur")
            .attr("in", "SourceAlpha")
            .attr("stdDeviation", 3)
            .attr("result", "blur");

        filter.append("feOffset")
            .attr("in", "blur")
            .attr("dx", -3)
            .attr("dy", -3) 
            .attr("result", "offsetBlur");

        filter.append("feFlood")
            .attr("flood-color", "rgba(0, 0, 0, 0.7)")
            .attr("flood-opacity", "1")
            .attr("result", "offsetColor");

        filter.append("feComposite")
            .attr("in", "offsetColor")
            .attr("in2", "offsetBlur")
            .attr("operator", "in");

        var feMerge = filter.append("feMerge");
        feMerge.append("feMergeNode").attr("in", "offsetBlur");
        feMerge.append("feMergeNode").attr("in", "SourceGraphic");

        const arc = d3.arc()
            .innerRadius(innerRadius)
            .outerRadius(outerRadius);

        // Set padAngle to create space between slices
        const pie = d3.pie()
            .value(1)
            .sort(null)
            .startAngle(-Math.PI / 2)
            .endAngle(Math.PI / 2);

        // Create the pie chart arcs
        const arcs = svg.selectAll(".arc")
            .data(pie(segmentData))
            .enter()
            .append("g") // Append a group for each arc
            .attr("class", "arc");

        // Append the path for each arc
        arcs.append("path")
            .attr("class", "arc")
            .attr("d", arc)
            .attr("fill", (d) => d.data.color)
            .style("cursor", "pointer")
            .on("mouseover", function(event, d) {
                d3.select(this)
                    .transition()
                    .duration(200);
            })
            .on("mouseout", function(event, d) {
                d3.select(this)
                    .transition()
                    .duration(200);
            })
            .on("click", function(event, d) {
                d3.selectAll(".arc")
                    .attr("stroke", "none") 
                    .attr("filter", null);

                const strokeColor = d3.rgb(d.data.color).darker(0.6);
                const shadowColor = d3.rgb(d.data.color).darker(0.6);
                d3.select("#innerShadow feFlood")
                    .attr("flood-color", shadowColor);

                d3.select(this)
                    .transition()
                    .duration(200)
                    .attr("stroke", strokeColor)
                    .attr("filter", "url(#innerShadow)");

                d3.selectAll(".arc").classed("active", false);

                d3.select(this).classed("active", true); 

                document.querySelectorAll('.rate-row').forEach(row => {
                    row.classList.remove('highlighted');
                });

                const selectedRows = document.querySelectorAll(`.rate-row.${d.data.category}`);
                
                if (selectedRows.length > 0) {
                    selectedRows.forEach(row => {
                        row.classList.add('highlighted');
                    });

                    const offset = 100; 
                    const scrollPosition = selectedRows[0].offsetTop - offset;
                    
                    window.scrollTo({
                        top: scrollPosition,
                        behavior: 'smooth'
                    });
                }
            });

        arcs.append("g") 
            .attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")"; }) 
            .each(function(d) {
                const labelGroup = d3.select(this).append("g");

                // Append the text element
                const bbox = labelGroup.append("text")
                    .text(d.data.label) 
                    .attr("class", "color-meter-text");

                // Get the bounding box of the text
                const textBBox = bbox.node().getBBox();

                labelGroup.insert("rect", "text") 
                    .attr("x", textBBox.x - 5) 
                    .attr("y", textBBox.y - 2) 
                    .attr("width", textBBox.width + 10)
                    .attr("height", textBBox.height + 4) 
                    .attr("fill", "white") 
                    .attr("rx", 5) 
                    .attr("ry", 5)
                    .attr("class", "color-meter-rect");

                labelGroup.on("mouseover", function() {
                    const path = d3.select(this.parentNode.parentNode).select("path");
                    path.transition()
                        .duration(200);
                });

                labelGroup.on("mouseout", function() {
                    const path = d3.select(this.parentNode.parentNode).select("path");
                    path.transition()
                        .duration(200);
                });

                labelGroup.on("click", function() {
                    d3.selectAll(".arc path")
                        .transition()
                        .duration(200)
                        .attr("stroke", "none")
                        .attr("filter", null);

                    const strokeColor = d3.rgb(d.data.color).darker(0.6);
                    const shadowColor = d3.rgb(d.data.color).darker(0.6);
                    d3.select("#innerShadow feFlood")
                        .attr("flood-color", shadowColor); 

                    d3.select(this.parentNode.parentNode).select("path")
                        .transition()
                        .duration(200)
                        .attr("stroke", strokeColor)
                        .style("filter", "box-shadow(inset 0px 0px 10px rgba(0, 0, 0, 0.5))");

                    d3.selectAll(".arc path").classed("active", false);
                    d3.select(this.parentNode.parentNode).select("path").classed("active", true);

                    const selectedRows = document.querySelectorAll(`.rate-row.${d.data.category}`);
                    selectedRows.forEach(row => {
                        row.classList.add('highlighted');
                    });

                    const offset = 100; 
                    const scrollPosition = selectedRows[0].offsetTop - offset;
                    window.scrollTo({
                        top: scrollPosition,
                        behavior: 'smooth'
                    });
                });
            });
    }

    // Draw the pie chart initially
    drawPieChart();

    // Resize event listener
    window.addEventListener('resize', function() {
        drawPieChart(); // Redraw the chart on resize
    });
});

</script>
end D3.js Script -->

<!--pie chart script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click event listeners to each pie slice
        document.querySelector('.pie.one .slice').addEventListener('click', function() {
            highlightRows('green');
            setActiveSlice(this.parentElement);
        });

        document.querySelector('.pie.two .slice').addEventListener('click', function() {
            highlightRows('orange');
            setActiveSlice(this.parentElement);
        });

        document.querySelector('.pie.three .slice').addEventListener('click', function() {
            highlightRows('red');
            setActiveSlice(this.parentElement);
        });

        function highlightRows(category) {
            // Remove highlight from all rows
            document.querySelectorAll('.rate-row').forEach(row => {
                row.classList.remove('highlighted');
            });

            // Find rows matching the selected color category
            const selectedRows = document.querySelectorAll(`.rate-row.${category}`);

            if (selectedRows.length > 0) {
                // Detect if the browser is Safari
                const isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

                console.log(selectedRows[0])

                // Add highlight to matching rows
                selectedRows.forEach(row => {
                    row.classList.add('highlighted');
                });

                // Define the default offset
                let offset = 150;

                // If Safari, increase the offset
                if (isSafari) {
                    offset = 350; // Adjust this value as needed
                }


                console.log('selectedRows[0]',
                    selectedRows[0])

                // Scroll to the first matching row
                const scrollPosition = selectedRows[0].offsetTop - offset;

                window.scrollTo({
                    top: scrollPosition,
                    behavior: 'smooth'
                });
            }

        }

        function setActiveSlice(activePie) {
            // Remove active class from all slices
            document.querySelectorAll('.pie').forEach(pie => {
                pie.querySelector('.slice').classList.remove('active');
            });

            // Add active class to the currently selected slice
            activePie.querySelector('.slice').classList.add('active');
        }
    });
</script>
<!--pie chart script -->