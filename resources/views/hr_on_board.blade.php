<script defer>
function getQueryParamf(param) {
    const queryString = window.location.search.substring(1);
    const params = queryString.split('&');
    for (let i = 0; i < params.length; i++) {
        const pair = params[i].split('=');
        if (pair[0] === param) {
            return pair[1] ? decodeURIComponent(pair[1]) : null;
        }
    }
    return null;
}
document.addEventListener('DOMContentLoaded', function() {
    // Custom function to parse query parameters
    function getQueryParam(param) {
        const params = new URLSearchParams(window.location.search);
        return params.get(param);
    }
    // Retrieve and decode the folder path from the URL parameters
    const folderPath = getQueryParam('folder');

    if (folderPath) {
        const decodedFolderPath = decodeURIComponent(folderPath);
        // Trigger a success alert with the decoded folder path
        // Swal.fire({
        //     title: 'Success!',
        //     text: `Navigated to folder: ${decodedFolderPath}`,
        //     icon: 'success',
        //     confirmButtonText: 'OK'
        // });
        // Fetch the folder contents and navigate to the folder
    }
});

// Now use it inside your event listener
$(document).on('change', '#sortOptions', function() {
    let sortOption = $(this).val();   // Get the selected sorting option
     const encodedString = getQueryParamf('folder');
     const decodedString = decodeURIComponent(encodedString);
     

    $.ajax({
        url: '/fetch-folder-contents',  // Adjust the URL to your route
        method: 'GET',
        data: {
            folderName: decodedString,
            sortOption: sortOption
        },
        beforeSend: function() {
            // Optionally show a loader while fetching the data
            $('.folder-contents').html('<p>Loading...</p>');
        },
        success: function(response) {
            // Update folder contents with the response
            $('.folder-contents').html(response.folderHtml);
        },
        error: function() {
            // Handle any errors
            $('.folder-contents').html('<p>Something went wrong. Please try again.</p>');
        }
    });
});


$(document).on('change', '#sortOptions', function() {
    let sortOption = $(this).val();   // Get the selected sorting option
    const encodedString = getQueryParamf('folder');
    const decodedString = decodeURIComponent(encodedString);

    $.ajax({
        url: '/fetch-subfolders2',  // Adjust the URL to your route
        method: 'GET',
        data: {
            folderName: decodedString,
            sortOption: sortOption
        },
        beforeSend: function() {
            // Show loader before sending request
            $('.loader').show();  // Display the loader
            $('.folder-contents').html(''); // Clear previous contents
        },
        success: function(response) {
            console.log(response.html);
            // Update folder contents with the response
            $('.folder-contents').html(response.html);
        },
        error: function() {
            // Handle any errors
            $('.folder-contents').html('<p>Something went wrong. Please try again.</p>');
        },
        complete: function() {
            // Hide loader after request completes (whether success or error)
            $('.loader').hide();  // Hide the loader
        }
    });
});




//   document.addEventListener('DOMContentLoaded', function() {
//         // Custom function to parse query parameters
//         function getQueryParam(param) {
//             const queryString = window.location.search.substring(1);
//             const params = queryString.split('&');
//             for (let i = 0; i < params.length; i++) {
//                 const pair = params[i].split('=');
//                 if (pair[0] === param) {
//                     return pair[1] ? decodeURIComponent(pair[1]) : null;
//                 }
//             }
//             return null;
//         }

        // Retrieve the folder path from the URL parameters
    //     const folderPath = getQueryParam('folder');
        
    //       const decodedFolderPath = decodeURIComponent(folderPath);

    //     if (folderPath) {
    //         // Decode the folder path to handle any encoded characters
    //         const decodedFolderPath = decodeURIComponent(folderPath);

    //         // Trigger a success alert with the decoded folder path
    //         // Swal.fire({
    //         //     title: 'Success!',
    //         //     text: `Navigated to folder: ${decodedFolderPath}`,
    //         //     icon: 'success',
    //         //     confirmButtonText: 'OK'
    //         // });
            

    //         // Fetch the folder contents and navigate to the folder
            
    //     }
    // });

   

$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
        $('.folder-contents, .file-container').hide();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
        $('.folder-contents, .file-container').show();
    }



    //  // Function to fetch subfolders and handle incorporation table appending
    function fetchSubfolders(folderPath, callback) {
        $.ajax({
            url: '/fetch-subfolders',
            method: 'GET',
            data: { path: folderPath },
            success: function(response) {
                const subfolderHtml = response.html;
                const $parentFolder = $(`[data-folder-path="${folderPath}"]`).parent();
                const $dropdownMenu = $parentFolder.find('.dropdown-menu');
                // Clear existing content and populate with new subfolder HTML
                $dropdownMenu.html(subfolderHtml);
                // Fetch folder contents and ensure visibility
                fetchFolderContents2(folderPath, false);
                // Invoke callback with the latest folder path if provided
                // if (callback) callback(response.latestFolderPath);
            },
            error: function(xhr) {
                console.error('Error fetching subfolder data:', xhr.responseText);
            }
        });
    }

function updateFolderList(newFolderPath) {
    if (newFolderPath) {
        openNewFolder(newFolderPath);
    }
}

function openNewFolder(folderPath) {
    const $newFolderLink = $(`[data-folder-path="${folderPath}"]`);
    if ($newFolderLink.length) {
        fetchSubfolders(folderPath, updateFolderList);
    } else {
        console.warn(`Folder link not found for path: ${folderPath}`);
    }
}

 function updateBreadcrumb(folderPath) {
    function getQueryParam(param) {
        const params = new URLSearchParams(window.location.search);
        return params.get(param);
    }

    // Retrieve the folder path from the URL parameters
    const folderPaths = getQueryParam('folder');
    const decodedFolderPath = folderPaths ? decodeURIComponent(folderPaths) : null;
    const pathToUse = decodedFolderPath || folderPath;

    // let breadcrumbHtml = '';
    // const folderNames = pathToUse.split('/');
    // let fullPath = '';

    // folderNames.forEach((folderName, index) => {
    //     fullPath += (index > 0 ? '/' : '') + folderName;

    //     if (index === folderNames.length - 1) {
            
    //         if (strpos(${folderName}, '_') !== false) {
    //             // Find the position of the '-' character
    //              let dash_position_name = strpos(${folderName}, '_');
                
    //             // Get the substring after the '-'
    //             let replacedName = substr(${folderName}, dash_position_name + 1);
    //             ${folderName} = replacedName ;
                
    //         }
    //         else{
    //             ${folderName} = ${folderName};
    //         }
            
            
    //         breadcrumbHtml += `<span>${folderName}</span>`;
    //     } else {
    //         breadcrumbHtml += `<a href="#" class="breadcrumb-link" data-folder-path="${fullPath}">${folderName}</a> <span>/</span>`;
    //     }
    // });
    
            let breadcrumbHtml = '';
            const folderNames = pathToUse.split('/');
            let fullPath = '';
            
            folderNames.forEach((folderName, index) => {
                fullPath += (index > 0 ? '/' : '') + folderName;
            
                // Check if the folderName contains '2024-2025October240_'
                const pattern = /^\d{4}-\d{4}(January|February|March|April|May|June|July|August|September|October|November|December)\d{1,}_/;
            
                if (pattern.test(folderName)) {
                    // Extract the substring after '2024-2025October240_'
                    let underscorePosition = folderName.indexOf('_');
                    folderName = folderName.slice(underscorePosition + 1);
                }
            
                if (index === folderNames.length - 1) {
                    // Add the last part of the breadcrumb as a plain span
                    breadcrumbHtml += `<span>${folderName}</span>`;
                } else {
                    // Add intermediate breadcrumb links
                    breadcrumbHtml += `<a href="#" class="breadcrumb-link" data-folder-path="${fullPath}">${folderName}</a> <span>/</span>`;
                }
            });
            
            
 if (!breadcrumbHtml.trim() || breadcrumbHtml === '<span></span>') {
        breadcrumbHtml = '<span>Home</span>'; // Set to Home if breadcrumb is empty
    }

    // Update the breadcrumb navigation path
    $('.nav-path').html(breadcrumbHtml);
    console.log("FDgfdgfdgdfgfd :" + breadcrumbHtml); // Log the actual breadcrumbHtml

    // Show or hide select_path_view based on breadcrumb content
    if (!breadcrumbHtml.trim() || breadcrumbHtml === '<span>Home</span>') {
        // Hide the select_path_view if breadcrumbHtml is empty or is just "Home"
        $('.select_path_view').hide();
    } else {
        // Show the select_path_view if breadcrumbHtml has content
        $('.select_path_view').show();
    }


    // Attach click event handler to breadcrumb links
    $(document).off('click', '.breadcrumb-link').on('click', '.breadcrumb-link', function(e) {
        e.preventDefault();
        const folderPath = $(this).data('folder-path');
 console.log("gjkhgjhgfgjjhghjghjgjhgjhgjhgjhgjhghjghjgjhgjyg: "+folderPath);
        console.log("Navigating to folder: " + folderPath);
        navigateToFolder(folderPath); // Function to handle navigation
    });
}

function toggleLabelWrap() {
    if ($('#parent-folder').val() || $('#parent-folders').val()) {
        $('.label_wrap').show();
    } else {
        $('.label_wrap').hide();
    }
}

// $(document).on('click', '.breadcrumb-link', function(e) {
//     e.preventDefault();
//     var folderPath = $(this).data('folder-path');
//     navigateToFolder(folderPath);
// });

$(document).on('click', '.breadcrumb-link', function(e) {
    e.preventDefault(); // Ensure this is used only when you intend to stop the browser's default behavior
    const folderPath = $(this).data('folder-path');
    console.log("gjkhgjhgfgjjhghjghjgjhgjhgjhgjhgjhghjghjgjhgjyg: "+folderPath);
    navigateToFolder(folderPath);
});

$(document).on('click', '.folder-link', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var folderPath = $this.data('folder-path');
    
    
    
    // Remove 'selected-folder' class from all folder links and toggle icons
    $('.folder-link').removeClass('selected-folder');
    $('.toggle_icconn').removeClass('selected-folder');

    // Toggle 'selected-folder' class on the clicked element
    if ($this.hasClass('selected-folder')) {
        $this.removeClass('selected-folder');
    } else {
        navigateToFolder(folderPath);
        $this.addClass('selected-folder');
    }
});

$(document).on('click', '.toggle_icconn', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var folderPath = $this.data('folder-path');
    
    

    // Remove 'active' class from all other toggle icons
    $('.toggle_icconn').removeClass('active');
    
    // Toggle 'active' class on the clicked element
    if ($this.hasClass('active')) {
        $this.removeClass('active'); // Remove 'active' class if it's already active
    } else {
        navigateToFolder1(folderPath);
        $this.addClass('active'); // Add 'active' class
    }
});


function navigateToFolder1(folderPath) {
  
    openNewFolder(folderPath);
    
    $('li a').removeClass('active');
    $(`[data-folder-path="${folderPath}"]`).addClass('active');
    $('#parent-folder, #parent-folders').val(folderPath);
    toggleLabelWrap();
}

function navigateToFolder(folderPath) {
    showLoader();

    // Decode the folder path to remove unwanted encoding
    folderPath = decodeURIComponent(folderPath);

   
        updateBreadcrumb(folderPath);
        fetchFolderContents(folderPath, false);
        openNewFolder(folderPath);
        $('li a').removeClass('selected-folder');
        $(`[data-folder-path="${folderPath}"]`).addClass('selected-folder');
        $('#parent-folder, #parent-folders').val(folderPath);
        toggleLabelWrap();
        
        // Save breadcrumb to session (implement this part as needed)

        // Trigger a success alert with the folder path
      

 

    if (folderPath) {
        const newUrl = new URL(window.location);
        newUrl.searchParams.set('folder', encodeURIComponent(folderPath));
        window.history.pushState({ path: newUrl.href }, '', newUrl.href);
    }
}

// Listen for browser navigation (back/forward buttons)
window.addEventListener('popstate', function(event) {
    // Check if the event has state information (this is your folderPath)
    if (event.state && event.state.folderPath) {
        // Update the page based on the state stored in the history
        updateBreadcrumb(event.state.folderPath);
        fetchSubfolders(event.state.folderPath);
    } else {
        // Handle the case where there's no state (for example, the initial page load)
        const initialFolderPath = getQueryParamSKY('folder') || '/'; // Default to root if no folder is in the URL
        updateBreadcrumb(initialFolderPath);
        fetchSubfolders(initialFolderPath);
    }
});
function getQueryParamSKY(param) {
    const params = new URLSearchParams(window.location.search);
    return params.get(param);
}


function bindFolderClickEvents() {
    $('.folder-link').off('click').on('click', function(e) {
        e.preventDefault();
        var folderPath = $(this).data('folder-path');
        navigateToFolder(folderPath);
    });
}
function removeDynamicPrefix(path) {
    // Extract the first segment before the first underscore (_) as the dynamic prefix
    let dynamicPrefix = path.match(/^\d{4}-\d{4}[A-Za-z]+\d+_/);
    
    if (dynamicPrefix) {
        // Replace all occurrences of the dynamic prefix from the path
        let cleanedPath = path.replace(new RegExp(dynamicPrefix[0], 'g'), '');
        return cleanedPath;
    } else {
        return path;  // If no dynamic prefix is found, return the original path
    }
}






 function fetchFolderContents(folderPath) {
        showLoader(); // Ensure the loader is shown when the request starts
       
         function getQueryParam(param) {
            const queryString = window.location.search.substring(1);
            const params = queryString.split('&');
            for (let i = 0; i < params.length; i++) {
                const pair = params[i].split('=');
                if (pair[0] === param) {
                    return pair[1] ? decodeURIComponent(pair[1]) : null;
                }
            }
            return null;
        }

        // Retrieve the folder path from the URL parameters
        const folderPaths = getQueryParam('folder');
        
          const decodedFolderPath = folderPaths ? decodeURIComponent(folderPaths) : null;
        const pathToUse = decodedFolderPath ? decodedFolderPath : folderPath;
        let resultto = removeDynamicPrefix(pathToUse);
    
        
        // Directly use the folderPath as it's already decoded when passed from above
        $.ajax({
            url: '/fetch-folder-contents',
            method: 'GET',
            data: { folderName: pathToUse },  // Use the folderPath as is
            success: function(response) {
                $('.folder-contents').html(response.folderHtml);
                $('.file-container').html(response.fileHtml);

                clearAppendedTables();

                if (pathToUse === 'Legal/Secretarial/Board Meetings' && !incorporationTableAppended) {
                    insertIncorporationTable();
                    incorporationTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Annual General Meeting' && !meetingTableAppended) {
                    insertMeetingTable();
                    meetingTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Extra Ordinary General Meeting' && !orderTableAppended) {
                    insertOrderTable();
                    orderTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Incorporation' && !incTableAppended) {
                    insertINCTable();
                    incTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Annual Filings' && !annTableAppended) {
                    insertANNTable();
                    annTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Director Appointments' && !directTableAppended) {
                    insertDirectTable();
                    directTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Director Resignation' && !directexitTableAppended) {
                    insertDirectexitTable();
                    directexitTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Auditor Appointment' && !auditappTableAppended) {
                    insertauditappTable();
                    auditappTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Auditor Exits' && !auditexitTableAppended) {
                    insertauditexitTable();
                    auditexitTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Statutory Registers' && !staturegiTableAppended) {
                    insertstaturegiTable();
                    staturegiTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Deposit Undertakings' && !undertakingTableAppended) {
                    insertundertakingTable();
                    undertakingTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Bank Account Statements' && !bankAccountStatementsTableAppended) {
                    insertbankAccountStatementsTable();
                    bankAccountStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Fixed Deposit Statements' && !bankFixedDepositStatementsTableAppended) {
                    insertbankFixedDepositStatementsTable();
                    bankFixedDepositStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Credit Card Statements' && !bankCreditCardStatementsTableAppended) {
                    insertbankCreditCardStatementsTable();
                    bankCreditCardStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Mutual Fund Statements' && !bankMutualFundStatementsTableAppended) {
                    insertbankMutualFundStatementsTable();
                    bankMutualFundStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Director Details/Director 1' && !charterdocumentsDirectordetatilsDirector1TableAppended) {
                    insertcharterdocumentsDirectordetatilsDirector1Table();
                    charterdocumentsDirectordetatilsDirector1TableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Director Details/Director 2' && !charterdocumentsDirectordetatilsDirector2TableAppended) {
                    insertcharterdocumentsDirectordetatilsDirector2Table();
                    charterdocumentsDirectordetatilsDirector2TableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Incorporation' && !charterdocumentsIncorporationTableAppended) {
                    insertcharterdocumentsIncorporationTableAppendedTable();
                    charterdocumentsIncorporationTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Registrations' && !charterdocumentsRegistrationsTableAppended) {
                    insertcharterdocumentsRegistrationsTableAppendedTable();
                    charterdocumentsRegistrationsTableAppended = true;
                }
                else if (resultto.includes("Employee Database/Onboarding documents") && !hronboarTableAppended) {
                    // alert(resultto);  // Display the result
                    inserthronboarTableAppended();  // Call the function to append the table
                    hronboarTableAppended = true;  // Set the flag to true to prevent further appends
                }


                bindFolderClickEvents();
                updateBreadcrumb(pathToUse);
                hideLoader(); // Hide loader after contents are updated
            },
            error: function(xhr) {
                console.error('Error fetching folder contents:', xhr.responseText);
                hideLoader(); // Hide loader in case of error
            }
        });
    }
//   $('#sortOptions').on('change', function() {
//     const folderPath = getQueryParamf('folder');
//     fetchFolderContents(folderPath);  // Call the function with the selected sorting option
//     });
    
    function fetchFolderContents2(folderPath) {
        // showLoader(); // Ensure the loader is shown when the request starts
       
         function getQueryParam(param) {
            const queryString = window.location.search.substring(1);
            const params = queryString.split('&');
            for (let i = 0; i < params.length; i++) {
                const pair = params[i].split('=');
                if (pair[0] === param) {
                    return pair[1] ? decodeURIComponent(pair[1]) : null;
                }
            }
            return null;
        }

        // Retrieve the folder path from the URL parameters
        const folderPaths = getQueryParam('folder');
        
          const decodedFolderPath = folderPaths ? decodeURIComponent(folderPaths) : null;
        const pathToUse = decodedFolderPath ? decodedFolderPath : folderPath;
        let resultto = removeDynamicPrefix(pathToUse);
        // Directly use the folderPath as it's already decoded when passed from above
        $.ajax({
            url: '/fetch-folder-contents',
            method: 'GET',
            data: { folderName: pathToUse },  // Use the folderPath as is
            success: function(response) {
                $('.folder-contents').html(response.folderHtml);
                $('.file-container').html(response.fileHtml);
                
                // console.log("path to use in fetch folder content 2 : "+pathToUse);
                
                // let pathToUse = 'Accounting & Taxation /Charter documents /Director Details /Director 1';

                // Split the string by '/' and trim spaces
                
                // const parts = pathToUse.split('/').map(part => part.trim());
    
                // let incrementalPaths = [];
                
                // // Loop through the parts and create incremental paths
                // let currentPath = '';
                // // console.log("parts is ss: "+parts);
                
                // parts.forEach((part, index) => {
                //     // Append the current part to the growing path
                //     currentPath = currentPath ? currentPath + '/' + part : part;
                //     // console.log("nanananananananaaaaaaaa:::::: "+currentPath);
                    
                //     const element = $(`.toggle_icconn[data-folder-path="${currentPath}"]`);
                //     // const element = $(`b.toggle_icconn[data-folder-path="${currentPath}"]`);

                // if (element.length) {
                // // Add the 'show' class to its sibling <ul> element with class 'dropdown-menu'
                // element.closest('li').find('ul.dropdown-menu').addClass('show');
                // // element.closest('li').find('a.folder-link').addClass('show');
                    
                // }
    
                // // Ensure the click event is attached only once and click the element programmatically
                // if (!element.hasClass('clicked-once')) {
                //     element.addClass('clicked-once').on('click', function() {
                //         // console.log("Element clicked once!");
                //     }).trigger('click'); // Trigger the click programmatically
                // }
                // // 
                
                
                    
                //     // Push the incremental path to the array
                //     // incrementalPaths.push(currentPath);
                // });
                
                // $(`a[data-folder-path="${pathToUse}"]`).addClass('selected-folder');
                
                
                
                // console.log(incrementalPaths);

                
                
                // -------------------------------------------------

                clearAppendedTables();

                if (pathToUse === 'Legal/Secretarial/Board Meetings' && !incorporationTableAppended) {
                    insertIncorporationTable();
                    incorporationTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Annual General Meeting' && !meetingTableAppended) {
                    insertMeetingTable();
                    meetingTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Extra Ordinary General Meeting' && !orderTableAppended) {
                    insertOrderTable();
                    orderTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Incorporation' && !incTableAppended) {
                    insertINCTable();
                    incTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Annual Filings' && !annTableAppended) {
                    insertANNTable();
                    annTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Director Appointments' && !directTableAppended) {
                    insertDirectTable();
                    directTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Director Resignation' && !directexitTableAppended) {
                    insertDirectexitTable();
                    directexitTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Auditor Appointment' && !auditappTableAppended) {
                    insertauditappTable();
                    auditappTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Auditor Exits' && !auditexitTableAppended) {
                    insertauditexitTable();
                    auditexitTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Statutory Registers' && !staturegiTableAppended) {
                    insertstaturegiTable();
                    staturegiTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Deposit Undertakings' && !undertakingTableAppended) {
                    insertundertakingTable();
                    undertakingTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Bank Account Statements' && !bankAccountStatementsTableAppended) {
                    insertbankAccountStatementsTable();
                    bankAccountStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Fixed Deposit Statements' && !bankFixedDepositStatementsTableAppended) {
                    insertbankFixedDepositStatementsTable();
                    bankFixedDepositStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Credit Card Statements' && !bankCreditCardStatementsTableAppended) {
                    insertbankCreditCardStatementsTable();
                    bankCreditCardStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Mutual Fund Statements' && !bankMutualFundStatementsTableAppended) {
                    insertbankMutualFundStatementsTable();
                    bankMutualFundStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Director Details/Director 1' && !charterdocumentsDirectordetatilsDirector1TableAppended) {
                    insertcharterdocumentsDirectordetatilsDirector1Table();
                    charterdocumentsDirectordetatilsDirector1TableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Director Details/Director 2' && !charterdocumentsDirectordetatilsDirector2TableAppended) {
                    insertcharterdocumentsDirectordetatilsDirector2Table();
                    charterdocumentsDirectordetatilsDirector2TableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Incorporation' && !charterdocumentsIncorporationTableAppended) {
                    insertcharterdocumentsIncorporationTableAppendedTable();
                    charterdocumentsIncorporationTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Registrations' && !charterdocumentsRegistrationsTableAppended) {
                    insertcharterdocumentsRegistrationsTableAppendedTable();
                    charterdocumentsRegistrationsTableAppended = true;
                }
                else if (resultto.includes("Employee Database/Onboarding documents") && !hronboarTableAppended) {
                    
                    inserthronboarTableAppended();  // Call the function to append the table
                    hronboarTableAppended = true;  // Set the flag to true to prevent further appends
                }

                bindFolderClickEvents();
                updateBreadcrumb(pathToUse);
                // hideLoader(); // Hide loader after contents are updated
            },
            error: function(xhr) {
                console.error('Error fetching folder contents:', xhr.responseText);
                // hideLoader(); // Hide loader in case of error
            }
        });
    }


    var incorporationTableAppended = false;
    var meetingTableAppended = false;
    var orderTableAppended = false;
    var incTableAppended = false;
    var annTableAppended = false;
    var directTableAppended = false;
    var directexitTableAppended = false;
    var auditappTableAppended = false;
    var auditexitTableAppended = false;
    var staturegiTableAppended = false;
    var undertakingTableAppended = false;
    var bankAccountStatementsTableAppended = false;
    var bankFixedDepositStatementsTableAppended = false;
    var bankCreditCardStatementsTableAppended = false;
    var bankMutualFundStatementsTableAppended = false;
    var charterdocumentsDirectordetatilsDirector1TableAppended = false;
    var charterdocumentsDirectordetatilsDirector2TableAppended = false;
    var charterdocumentsIncorporationTableAppended = false;
    var charterdocumentsRegistrationsTableAppended = false;
    var hronboarTableAppended = false;
    



// Define the folder-to-function mappings and appended status
const tableFunctions = {
    'Legal/Secretarial/Board Meetings': ['insertIncorporationTable', 'incorporationTableAppended'],
    'Legal/Secretarial/Annual General Meeting': ['insertMeetingTable', 'meetingTableAppended'],
    'Legal/Secretarial/Extra Ordinary General Meeting': ['insertOrderTable', 'orderTableAppended'],
    'Legal/Secretarial/Incorporation': ['insertINCTable', 'incTableAppended'],
    'Legal/Secretarial/Annual Filings': ['insertANNTable', 'annTableAppended'],
    'Legal/Secretarial/Director Appointments': ['insertDirectTable', 'directTableAppended'],
    'Legal/Secretarial/Director Resignation': ['insertDirectexitTable', 'directexitTableAppended'],
    'Legal/Secretarial/Auditor Appointment': ['insertauditappTable', 'auditappTableAppended'],
    'Legal/Secretarial/Auditor Exits': ['insertauditexitTable', 'auditexitTableAppended'],
    'Legal/Secretarial/Statutory Registers': ['insertstaturegiTable', 'staturegiTableAppended'],
    'Legal/Secretarial/Deposit Undertakings': ['insertundertakingTable', 'undertakingTableAppended'],
    'Accounting & Taxation/Book-Keeping/Bank Account Statements': ['insertbankAccountStatementsTable', 'bankAccountStatementsTableAppended'],
    'Accounting & Taxation/Book-Keeping/Fixed Deposit Statements': ['insertbankFixedDepositStatementsTable', 'bankFixedDepositStatementsTableAppended'],
    'Accounting & Taxation/Book-Keeping/Credit Card Statements': ['insertbankCreditCardStatementsTable', 'bankCreditCardStatementsTableAppended'],
    'Accounting & Taxation/Book-Keeping/Mutual Fund Statements': ['insertbankMutualFundStatementsTable', 'bankMutualFundStatementsTableAppended'],
    'Accounting & Taxation/Charter documents/Director Details/Director 1': ['insertcharterdocumentsDirectordetatilsDirector1Table', 'charterdocumentsDirectordetatilsDirector1TableAppended'],
    'Accounting & Taxation/Charter documents/Director Details/Director 2': ['insertcharterdocumentsDirectordetatilsDirector2Table', 'charterdocumentsDirectordetatilsDirector2TableAppended'],
    'Accounting & Taxation/Charter documents/Incorporation': ['insertcharterdocumentsIncorporationTable', 'charterdocumentsIncorporationTableAppended'],
    'Accounting & Taxation/Charter documents/Registrations': ['insertcharterdocumentsRegistrationsTable', 'charterdocumentsRegistrationsTableAppended']
};

// Function to check if the table is already appended
function isTableAppended(folderPath) {
    const tableFuncEntry = tableFunctions[folderPath];
    if (tableFuncEntry) {
        const flagName = tableFuncEntry[1];
        return JSON.parse(localStorage.getItem(flagName) || 'false');
    }
    return false;
}

// Function to set table appended status in localStorage
function setTableAppended(folderPath, status) {
    const tableFuncEntry = tableFunctions[folderPath];
    if (tableFuncEntry) {
        const flagName = tableFuncEntry[1];
        localStorage.setItem(flagName, JSON.stringify(status));
    }
}

// Clear appended table status
function clearAppendedTables() {
    for (let folderPath in tableFunctions) {
        const flagName = tableFunctions[folderPath][1];
        localStorage.removeItem(flagName);
    }
}

// Function to handle table insertion
function handleFolderPath(folderPath) {
    console.log("Handling folder path:", folderPath);
    let resultto = removeDynamicPrefix(pathToUse);
    clearAppendedTables();

    if (folderPath === 'Legal/Secretarial/Board Meetings' && !incorporationTableAppended) {
        console.log("Inserting Incorporation Table");
        insertIncorporationTable();
        incorporationTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Annual General Meeting' && !meetingTableAppended) {
        console.log("Inserting Meeting Table");
        insertMeetingTable();
        meetingTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Extra Ordinary General Meeting' && !orderTableAppended) {
        console.log("Inserting Order Table");
        insertOrderTable();
        orderTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Incorporation' && !incTableAppended) {
        console.log("Inserting INC Table");
        insertINCTable();
        incTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Annual Filings' && !annTableAppended) {
        console.log("Inserting ANN Table");
        insertANNTable();
        annTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Director Appointments' && !directTableAppended) {
        console.log("Inserting Direct Table");
        insertDirectTable();
        directTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Director Resignation' && !directexitTableAppended) {
        console.log("Inserting Direct Exit Table");
        insertDirectexitTable();
        directexitTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Auditor Appointment' && !auditappTableAppended) {
        console.log("Inserting Audit App Table");
        insertauditappTable();
        auditappTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Auditor Exits' && !auditexitTableAppended) {
        console.log("Inserting Audit Exit Table");
        insertauditexitTable();
        auditexitTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Statutory Registers' && !staturegiTableAppended) {
        console.log("Inserting Statutory Registers Table");
        insertstaturegiTable();
        staturegiTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Deposit Undertakings' && !undertakingTableAppended) {
        console.log("Inserting Undertaking Table");
        insertundertakingTable();
        undertakingTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Book-Keeping/Bank Account Statements' && !bankAccountStatementsTableAppended) {
        console.log("Inserting Bank Account Statements Table");
        insertbankAccountStatementsTable();
        bankAccountStatementsTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Book-Keeping/Fixed Deposit Statements' && !bankFixedDepositStatementsTableAppended) {
        console.log("Inserting Fixed Deposit Statements Table");
        insertbankFixedDepositStatementsTable();
        bankFixedDepositStatementsTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Book-Keeping/Credit Card Statements' && !bankCreditCardStatementsTableAppended) {
        console.log("Inserting Credit Card Statements Table");
        insertbankCreditCardStatementsTable();
        bankCreditCardStatementsTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Book-Keeping/Mutual Fund Statements' && !bankMutualFundStatementsTableAppended) {
        console.log("Inserting Mutual Fund Statements Table");
        insertbankMutualFundStatementsTable();
        bankMutualFundStatementsTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Charter documents/Director Details/Director 1' && !charterdocumentsDirectordetatilsDirector1TableAppended) {
        console.log("Inserting Director 1 Table");
        insertcharterdocumentsDirectordetatilsDirector1Table();
        charterdocumentsDirectordetatilsDirector1TableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Charter documents/Director Details/Director 2' && !charterdocumentsDirectordetatilsDirector2TableAppended) {
        console.log("Inserting Director 2 Table");
        insertcharterdocumentsDirectordetatilsDirector2Table();
        charterdocumentsDirectordetatilsDirector2TableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Charter documents/Incorporation' && !charterdocumentsIncorporationTableAppended) {
        console.log("Inserting Incorporation Table");
        insertcharterdocumentsIncorporationTableAppendedTable();
        charterdocumentsIncorporationTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Charter documents/Registrations' && !charterdocumentsRegistrationsTableAppended) {
        console.log("Inserting Registrations Table");
        insertcharterdocumentsRegistrationsTableAppendedTable();
        charterdocumentsRegistrationsTableAppended = true;
    }

    else if (folderPath === "Employee Database/Onboarding documents" && !hronboarTableAppended) {
     
    inserthronboarTableAppended();  
    hronboarTableAppended = true;  
}
}

// Fetch folder contents

    function clearAppendedTables() {
        incorporationTableAppended = false;
        meetingTableAppended = false;
        orderTableAppended = false;
        incTableAppended = false;
        annTableAppended = false;
        directTableAppended = false;
        directexitTableAppended = false;
        auditappTableAppended = false;
        auditexitTableAppended = false;
        staturegiTableAppended = false;
        undertakingTableAppended = false;
        bankAccountStatementsTableAppended = false;
        bankFixedDepositStatementsTableAppended = false;
        bankCreditCardStatementsTableAppended = false;
        bankMutualFundStatementsTableAppended = false;
        charterdocumentsDirectordetatilsDirector1TableAppended = false;
        charterdocumentsDirectordetatilsDirector2TableAppended = false;
        charterdocumentsIncorporationTableAppended = false;
        charterdocumentsRegistrationsTableAppended = false;
        hronboarTableAppended = false;
    }
    
    
    
     function inserthronboarTableAppended() {
        const tableHtml = `
           

<div class="custom_table_wraap nestfile" >
    <div class="filecontents">
        <h4>Necccessary Files</h4>
        <span><b>4 path available</b></span>
        </div>
            <table class="table table-striped"  >
            <thead>
                <tr>
                    <th></th>
                    <th>File name</th>                    
                    <th>Total Space</th>
                    <th>View Doc's</th>
                    <th>Upload</th>
                     <th></th>
                    <!--<th>More</th>-->
                </tr>
            </thead>
            <tbody id="tablerefreshdata">
                                            
               
    <tr class="boardnootice">
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>Offer Letter</td>                                                              
                             <td><span id="total-size-td">{{$totalSizeKBemponboard}} KB</span> </td>
                              <td> 
                            <div class="type_number getparm" data-bs-toggle="modal" data-location="" data-bs-target="#Offer_Letter_count" id="Offer_Letter_countt">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 1.834C10.79 1.756 10.162 1.75 9.03 1.75C7.113 1.75 5.75 1.752 4.718 1.89C3.706 2.025 3.125 2.28 2.702 2.702C2.279 3.125 2.025 3.705 1.89 4.711C1.752 5.739 1.75 7.093 1.75 9.001V13.001C1.75 14.907 1.752 16.261 1.89 17.289C2.025 18.295 2.279 18.875 2.702 19.299C3.125 19.721 3.705 19.975 4.711 20.11C5.739 20.249 7.093 20.25 9 20.25H13C14.907 20.25 16.262 20.248 17.29 20.11C18.295 19.975 18.875 19.721 19.298 19.298C19.721 18.875 19.975 18.295 20.11 17.289C20.248 16.262 20.25 14.907 20.25 13V12.563C20.25 11.027 20.24 10.299 20.076 9.75H16.946C15.813 9.75 14.888 9.75 14.156 9.652C13.393 9.549 12.731 9.327 12.202 8.798C11.673 8.269 11.451 7.608 11.348 6.843C11.25 6.113 11.25 5.187 11.25 4.053V1.834ZM12.75 2.61V4C12.75 5.2 12.752 6.024 12.835 6.643C12.915 7.241 13.059 7.534 13.263 7.737C13.466 7.941 13.759 8.085 14.357 8.165C14.976 8.248 15.8 8.25 17 8.25H19.02C18.6363 7.88459 18.2462 7.52587 17.85 7.174L13.891 3.611C13.5175 3.26961 13.1371 2.93587 12.75 2.61ZM9.175 0.25C10.56 0.25 11.455 0.25 12.278 0.565C13.101 0.881 13.763 1.477 14.788 2.4L14.895 2.496L18.853 6.059L18.978 6.171C20.162 7.236 20.928 7.925 21.339 8.849C21.751 9.773 21.751 10.803 21.75 12.395V13.056C21.75 14.894 21.75 16.35 21.597 17.489C21.439 18.661 21.107 19.61 20.359 20.359C19.61 21.107 18.661 21.439 17.489 21.597C16.349 21.75 14.894 21.75 13.056 21.75H8.944C7.106 21.75 5.65 21.75 4.511 21.597C3.339 21.439 2.39 21.107 1.641 20.359C0.893 19.61 0.561 18.661 0.403 17.489C0.25 16.349 0.25 14.894 0.25 13.056V8.945C0.25 7.107 0.25 5.651 0.403 4.512C0.561 3.34 0.893 2.391 1.641 1.642C2.391 0.893 3.342 0.562 4.519 0.404C5.663 0.251 7.126 0.251 8.974 0.251H9.03L9.175 0.25Z" fill="#ABABAB"/>
</svg>
<span class="cpoont"><span id="entries-count-td">{{$countemponboard}}</span></span>
                            </div>

                            </td>
 
                          <td>
                           
                            <button class="btndd hidebdnotice getparm" style="border-radius:5px;"   data-bs-toggle="modal" data-bs-target="#common_file_upload_pop" data-location="" data-real-file-name="Offer Letter">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2867_6271)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00065 0.833008C8.07284 0.832962 8.14419 0.848551 8.20979 0.878702C8.27539 0.908854 8.33368 0.952853 8.38065 1.00767L10.3807 3.34101C10.4669 3.44179 10.5096 3.57272 10.4994 3.705C10.4891 3.83727 10.4268 3.96006 10.326 4.04634C10.2252 4.13262 10.0943 4.17534 9.962 4.16509C9.82972 4.15483 9.70693 4.09246 9.62065 3.99167L8.50065 2.68501V9.99967C8.50065 10.1323 8.44797 10.2595 8.3542 10.3532C8.26044 10.447 8.13326 10.4997 8.00065 10.4997C7.86804 10.4997 7.74087 10.447 7.6471 10.3532C7.55333 10.2595 7.50065 10.1323 7.50065 9.99967V2.68434L6.38065 3.99167C6.33793 4.04158 6.28579 4.08258 6.22723 4.11233C6.16866 4.14208 6.1048 4.16001 6.03931 4.16509C5.97381 4.17016 5.90796 4.16229 5.8455 4.14191C5.78305 4.12154 5.72522 4.08906 5.67532 4.04634C5.62542 4.00362 5.58442 3.95148 5.55466 3.89292C5.52491 3.83435 5.50698 3.77049 5.5019 3.705C5.49683 3.6395 5.5047 3.57365 5.52508 3.51119C5.54545 3.44874 5.57793 3.39091 5.62065 3.34101L7.62065 1.00767C7.66763 0.952853 7.72591 0.908854 7.79151 0.878702C7.85711 0.848551 7.92846 0.832962 8.00065 0.833008ZM4.66465 5.50101C4.79726 5.5003 4.92472 5.5523 5.01899 5.64557C5.11325 5.73884 5.16661 5.86573 5.16732 5.99834C5.16802 6.13095 5.11602 6.25841 5.02276 6.35268C4.92949 6.44694 4.80259 6.5003 4.66998 6.50101C3.94132 6.50501 3.42465 6.52367 3.03198 6.59567C2.65465 6.66567 2.43532 6.77701 2.27332 6.93901C2.08865 7.12367 1.96865 7.38301 1.90265 7.87234C1.83532 8.37567 1.83398 9.04301 1.83398 9.99967V10.6663C1.83398 11.6237 1.83532 12.291 1.90265 12.7943C1.96865 13.2837 2.08932 13.5423 2.27332 13.7277C2.45798 13.9117 2.71665 14.0317 3.20665 14.0977C3.70932 14.1657 4.37732 14.1663 5.33398 14.1663H10.6673C11.624 14.1663 12.2913 14.1657 12.7953 14.0977C13.2846 14.0317 13.5433 13.9117 13.728 13.727C13.9127 13.5423 14.0326 13.2837 14.0986 12.7943C14.166 12.291 14.1673 11.6237 14.1673 10.6663V9.99967C14.1673 9.04301 14.166 8.37567 14.0986 7.87167C14.0326 7.38301 13.912 7.12367 13.728 6.93901C13.5653 6.77701 13.3467 6.66567 12.9693 6.59567C12.5766 6.52367 12.06 6.50501 11.3313 6.50101C11.2657 6.50066 11.2007 6.48738 11.1402 6.46193C11.0796 6.43648 11.0247 6.39935 10.9785 6.35268C10.9324 6.306 10.8958 6.25068 10.871 6.18989C10.8462 6.12909 10.8336 6.064 10.834 5.99834C10.8343 5.93268 10.8476 5.86773 10.8731 5.8072C10.8985 5.74667 10.9356 5.69175 10.9823 5.64557C11.029 5.59939 11.0843 5.56285 11.1451 5.53805C11.2059 5.51324 11.271 5.50066 11.3366 5.50101C12.058 5.50501 12.6587 5.52234 13.15 5.61234C13.6553 5.70567 14.0853 5.88234 14.4353 6.23234C14.8367 6.63301 15.0087 7.13901 15.09 7.73901C15.1673 8.31634 15.1673 9.05167 15.1673 9.96301V10.703C15.1673 11.615 15.1673 12.3497 15.09 12.9277C15.0087 13.5277 14.8367 14.033 14.4353 14.4343C14.034 14.8357 13.5287 15.0077 12.9287 15.089C12.3507 15.1663 11.6153 15.1663 10.704 15.1663H5.29732C4.38598 15.1663 3.65065 15.1663 3.07265 15.089C2.47265 15.0083 1.96732 14.8357 1.56598 14.4343C1.16465 14.033 0.992651 13.5277 0.911984 12.9277C0.833984 12.3497 0.833984 11.6143 0.833984 10.703V9.96301C0.833984 9.05167 0.833984 8.31634 0.911984 7.73834C0.991984 7.13834 1.16532 6.63301 1.56598 6.23167C1.91598 5.88234 2.34598 5.70501 2.85132 5.61234C3.34265 5.52234 3.94332 5.50501 4.66465 5.50101Z" fill="#868686"/>
</g>
<defs>
<clipPath id="clip0_2867_6271">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg> </button>                                                      
                          </td>
                                          
<td>
                <!--<div class="dropdown">-->
                <!--    <button onclick="toggleDropdown()" class="dropbtn show_pp">-->
                <!--        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--</div>               -->

            </td>


                        </tr>    

                         <tr class="MinuteBook">
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>Acceptance Letter</td>                                                              
                             <td><span id="total-sizeminbook-td">{{$totalSizeKBemponboardal}} KB</span> </td>
                              <td> 
                            <div class="type_number getparm" data-bs-toggle="modal" data-location="" data-bs-target="#Acceptance_Letter_count" id="Acceptance_Letter_countt">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 1.834C10.79 1.756 10.162 1.75 9.03 1.75C7.113 1.75 5.75 1.752 4.718 1.89C3.706 2.025 3.125 2.28 2.702 2.702C2.279 3.125 2.025 3.705 1.89 4.711C1.752 5.739 1.75 7.093 1.75 9.001V13.001C1.75 14.907 1.752 16.261 1.89 17.289C2.025 18.295 2.279 18.875 2.702 19.299C3.125 19.721 3.705 19.975 4.711 20.11C5.739 20.249 7.093 20.25 9 20.25H13C14.907 20.25 16.262 20.248 17.29 20.11C18.295 19.975 18.875 19.721 19.298 19.298C19.721 18.875 19.975 18.295 20.11 17.289C20.248 16.262 20.25 14.907 20.25 13V12.563C20.25 11.027 20.24 10.299 20.076 9.75H16.946C15.813 9.75 14.888 9.75 14.156 9.652C13.393 9.549 12.731 9.327 12.202 8.798C11.673 8.269 11.451 7.608 11.348 6.843C11.25 6.113 11.25 5.187 11.25 4.053V1.834ZM12.75 2.61V4C12.75 5.2 12.752 6.024 12.835 6.643C12.915 7.241 13.059 7.534 13.263 7.737C13.466 7.941 13.759 8.085 14.357 8.165C14.976 8.248 15.8 8.25 17 8.25H19.02C18.6363 7.88459 18.2462 7.52587 17.85 7.174L13.891 3.611C13.5175 3.26961 13.1371 2.93587 12.75 2.61ZM9.175 0.25C10.56 0.25 11.455 0.25 12.278 0.565C13.101 0.881 13.763 1.477 14.788 2.4L14.895 2.496L18.853 6.059L18.978 6.171C20.162 7.236 20.928 7.925 21.339 8.849C21.751 9.773 21.751 10.803 21.75 12.395V13.056C21.75 14.894 21.75 16.35 21.597 17.489C21.439 18.661 21.107 19.61 20.359 20.359C19.61 21.107 18.661 21.439 17.489 21.597C16.349 21.75 14.894 21.75 13.056 21.75H8.944C7.106 21.75 5.65 21.75 4.511 21.597C3.339 21.439 2.39 21.107 1.641 20.359C0.893 19.61 0.561 18.661 0.403 17.489C0.25 16.349 0.25 14.894 0.25 13.056V8.945C0.25 7.107 0.25 5.651 0.403 4.512C0.561 3.34 0.893 2.391 1.641 1.642C2.391 0.893 3.342 0.562 4.519 0.404C5.663 0.251 7.126 0.251 8.974 0.251H9.03L9.175 0.25Z" fill="#ABABAB"/>
</svg>
<span class="cpoont"><span id="entries-countminbook-td">{{$countemponboardal}}</span></span>
                            </div>

                            </td>
 
                          <td>
                           
                            <button class="btndd hidebdnotice getparm" style="border-radius:5px;"   data-bs-toggle="modal" data-bs-target="#common_file_upload_pop" data-location="" data-real-file-name="Acceptance Letter">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2867_6271)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00065 0.833008C8.07284 0.832962 8.14419 0.848551 8.20979 0.878702C8.27539 0.908854 8.33368 0.952853 8.38065 1.00767L10.3807 3.34101C10.4669 3.44179 10.5096 3.57272 10.4994 3.705C10.4891 3.83727 10.4268 3.96006 10.326 4.04634C10.2252 4.13262 10.0943 4.17534 9.962 4.16509C9.82972 4.15483 9.70693 4.09246 9.62065 3.99167L8.50065 2.68501V9.99967C8.50065 10.1323 8.44797 10.2595 8.3542 10.3532C8.26044 10.447 8.13326 10.4997 8.00065 10.4997C7.86804 10.4997 7.74087 10.447 7.6471 10.3532C7.55333 10.2595 7.50065 10.1323 7.50065 9.99967V2.68434L6.38065 3.99167C6.33793 4.04158 6.28579 4.08258 6.22723 4.11233C6.16866 4.14208 6.1048 4.16001 6.03931 4.16509C5.97381 4.17016 5.90796 4.16229 5.8455 4.14191C5.78305 4.12154 5.72522 4.08906 5.67532 4.04634C5.62542 4.00362 5.58442 3.95148 5.55466 3.89292C5.52491 3.83435 5.50698 3.77049 5.5019 3.705C5.49683 3.6395 5.5047 3.57365 5.52508 3.51119C5.54545 3.44874 5.57793 3.39091 5.62065 3.34101L7.62065 1.00767C7.66763 0.952853 7.72591 0.908854 7.79151 0.878702C7.85711 0.848551 7.92846 0.832962 8.00065 0.833008ZM4.66465 5.50101C4.79726 5.5003 4.92472 5.5523 5.01899 5.64557C5.11325 5.73884 5.16661 5.86573 5.16732 5.99834C5.16802 6.13095 5.11602 6.25841 5.02276 6.35268C4.92949 6.44694 4.80259 6.5003 4.66998 6.50101C3.94132 6.50501 3.42465 6.52367 3.03198 6.59567C2.65465 6.66567 2.43532 6.77701 2.27332 6.93901C2.08865 7.12367 1.96865 7.38301 1.90265 7.87234C1.83532 8.37567 1.83398 9.04301 1.83398 9.99967V10.6663C1.83398 11.6237 1.83532 12.291 1.90265 12.7943C1.96865 13.2837 2.08932 13.5423 2.27332 13.7277C2.45798 13.9117 2.71665 14.0317 3.20665 14.0977C3.70932 14.1657 4.37732 14.1663 5.33398 14.1663H10.6673C11.624 14.1663 12.2913 14.1657 12.7953 14.0977C13.2846 14.0317 13.5433 13.9117 13.728 13.727C13.9127 13.5423 14.0326 13.2837 14.0986 12.7943C14.166 12.291 14.1673 11.6237 14.1673 10.6663V9.99967C14.1673 9.04301 14.166 8.37567 14.0986 7.87167C14.0326 7.38301 13.912 7.12367 13.728 6.93901C13.5653 6.77701 13.3467 6.66567 12.9693 6.59567C12.5766 6.52367 12.06 6.50501 11.3313 6.50101C11.2657 6.50066 11.2007 6.48738 11.1402 6.46193C11.0796 6.43648 11.0247 6.39935 10.9785 6.35268C10.9324 6.306 10.8958 6.25068 10.871 6.18989C10.8462 6.12909 10.8336 6.064 10.834 5.99834C10.8343 5.93268 10.8476 5.86773 10.8731 5.8072C10.8985 5.74667 10.9356 5.69175 10.9823 5.64557C11.029 5.59939 11.0843 5.56285 11.1451 5.53805C11.2059 5.51324 11.271 5.50066 11.3366 5.50101C12.058 5.50501 12.6587 5.52234 13.15 5.61234C13.6553 5.70567 14.0853 5.88234 14.4353 6.23234C14.8367 6.63301 15.0087 7.13901 15.09 7.73901C15.1673 8.31634 15.1673 9.05167 15.1673 9.96301V10.703C15.1673 11.615 15.1673 12.3497 15.09 12.9277C15.0087 13.5277 14.8367 14.033 14.4353 14.4343C14.034 14.8357 13.5287 15.0077 12.9287 15.089C12.3507 15.1663 11.6153 15.1663 10.704 15.1663H5.29732C4.38598 15.1663 3.65065 15.1663 3.07265 15.089C2.47265 15.0083 1.96732 14.8357 1.56598 14.4343C1.16465 14.033 0.992651 13.5277 0.911984 12.9277C0.833984 12.3497 0.833984 11.6143 0.833984 10.703V9.96301C0.833984 9.05167 0.833984 8.31634 0.911984 7.73834C0.991984 7.13834 1.16532 6.63301 1.56598 6.23167C1.91598 5.88234 2.34598 5.70501 2.85132 5.61234C3.34265 5.52234 3.94332 5.50501 4.66465 5.50101Z" fill="#868686"/>
</g>
<defs>
<clipPath id="clip0_2867_6271">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg> </button>                                                      
                          </td>
                                          
<td>
                <!--<div class="dropdown">-->
                <!--    <button onclick="toggleDropdown()" class="dropbtn show_pp">-->
                <!--        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--</div>               -->

            </td>


                        </tr>    

                         <tr class="Attendancesheet">
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>Employment Agreement</td>                                                              
                             <td><span id="total-sizeboardas-td">{{$totalSizeKBemponboardea}} KB</span> </td>
                              <td> 
                            <div class="type_number getparm" data-location="" data-bs-toggle="modal" data-bs-target="#Employment_Agreement_count" id="Employment_Agreement_countt">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 1.834C10.79 1.756 10.162 1.75 9.03 1.75C7.113 1.75 5.75 1.752 4.718 1.89C3.706 2.025 3.125 2.28 2.702 2.702C2.279 3.125 2.025 3.705 1.89 4.711C1.752 5.739 1.75 7.093 1.75 9.001V13.001C1.75 14.907 1.752 16.261 1.89 17.289C2.025 18.295 2.279 18.875 2.702 19.299C3.125 19.721 3.705 19.975 4.711 20.11C5.739 20.249 7.093 20.25 9 20.25H13C14.907 20.25 16.262 20.248 17.29 20.11C18.295 19.975 18.875 19.721 19.298 19.298C19.721 18.875 19.975 18.295 20.11 17.289C20.248 16.262 20.25 14.907 20.25 13V12.563C20.25 11.027 20.24 10.299 20.076 9.75H16.946C15.813 9.75 14.888 9.75 14.156 9.652C13.393 9.549 12.731 9.327 12.202 8.798C11.673 8.269 11.451 7.608 11.348 6.843C11.25 6.113 11.25 5.187 11.25 4.053V1.834ZM12.75 2.61V4C12.75 5.2 12.752 6.024 12.835 6.643C12.915 7.241 13.059 7.534 13.263 7.737C13.466 7.941 13.759 8.085 14.357 8.165C14.976 8.248 15.8 8.25 17 8.25H19.02C18.6363 7.88459 18.2462 7.52587 17.85 7.174L13.891 3.611C13.5175 3.26961 13.1371 2.93587 12.75 2.61ZM9.175 0.25C10.56 0.25 11.455 0.25 12.278 0.565C13.101 0.881 13.763 1.477 14.788 2.4L14.895 2.496L18.853 6.059L18.978 6.171C20.162 7.236 20.928 7.925 21.339 8.849C21.751 9.773 21.751 10.803 21.75 12.395V13.056C21.75 14.894 21.75 16.35 21.597 17.489C21.439 18.661 21.107 19.61 20.359 20.359C19.61 21.107 18.661 21.439 17.489 21.597C16.349 21.75 14.894 21.75 13.056 21.75H8.944C7.106 21.75 5.65 21.75 4.511 21.597C3.339 21.439 2.39 21.107 1.641 20.359C0.893 19.61 0.561 18.661 0.403 17.489C0.25 16.349 0.25 14.894 0.25 13.056V8.945C0.25 7.107 0.25 5.651 0.403 4.512C0.561 3.34 0.893 2.391 1.641 1.642C2.391 0.893 3.342 0.562 4.519 0.404C5.663 0.251 7.126 0.251 8.974 0.251H9.03L9.175 0.25Z" fill="#ABABAB"/>
</svg>
<span class="cpoont"><span id="entries-countboardas-td">{{$countemponboardea}}</span></span>
                            </div>

                            </td>
 
                          <td>
                           
                            <button class="btndd hidebdnotice getparm" style="border-radius:5px;"   data-bs-toggle="modal" data-bs-target="#common_file_upload_pop" data-location="" data-real-file-name="Employment Agreement">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2867_6271)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00065 0.833008C8.07284 0.832962 8.14419 0.848551 8.20979 0.878702C8.27539 0.908854 8.33368 0.952853 8.38065 1.00767L10.3807 3.34101C10.4669 3.44179 10.5096 3.57272 10.4994 3.705C10.4891 3.83727 10.4268 3.96006 10.326 4.04634C10.2252 4.13262 10.0943 4.17534 9.962 4.16509C9.82972 4.15483 9.70693 4.09246 9.62065 3.99167L8.50065 2.68501V9.99967C8.50065 10.1323 8.44797 10.2595 8.3542 10.3532C8.26044 10.447 8.13326 10.4997 8.00065 10.4997C7.86804 10.4997 7.74087 10.447 7.6471 10.3532C7.55333 10.2595 7.50065 10.1323 7.50065 9.99967V2.68434L6.38065 3.99167C6.33793 4.04158 6.28579 4.08258 6.22723 4.11233C6.16866 4.14208 6.1048 4.16001 6.03931 4.16509C5.97381 4.17016 5.90796 4.16229 5.8455 4.14191C5.78305 4.12154 5.72522 4.08906 5.67532 4.04634C5.62542 4.00362 5.58442 3.95148 5.55466 3.89292C5.52491 3.83435 5.50698 3.77049 5.5019 3.705C5.49683 3.6395 5.5047 3.57365 5.52508 3.51119C5.54545 3.44874 5.57793 3.39091 5.62065 3.34101L7.62065 1.00767C7.66763 0.952853 7.72591 0.908854 7.79151 0.878702C7.85711 0.848551 7.92846 0.832962 8.00065 0.833008ZM4.66465 5.50101C4.79726 5.5003 4.92472 5.5523 5.01899 5.64557C5.11325 5.73884 5.16661 5.86573 5.16732 5.99834C5.16802 6.13095 5.11602 6.25841 5.02276 6.35268C4.92949 6.44694 4.80259 6.5003 4.66998 6.50101C3.94132 6.50501 3.42465 6.52367 3.03198 6.59567C2.65465 6.66567 2.43532 6.77701 2.27332 6.93901C2.08865 7.12367 1.96865 7.38301 1.90265 7.87234C1.83532 8.37567 1.83398 9.04301 1.83398 9.99967V10.6663C1.83398 11.6237 1.83532 12.291 1.90265 12.7943C1.96865 13.2837 2.08932 13.5423 2.27332 13.7277C2.45798 13.9117 2.71665 14.0317 3.20665 14.0977C3.70932 14.1657 4.37732 14.1663 5.33398 14.1663H10.6673C11.624 14.1663 12.2913 14.1657 12.7953 14.0977C13.2846 14.0317 13.5433 13.9117 13.728 13.727C13.9127 13.5423 14.0326 13.2837 14.0986 12.7943C14.166 12.291 14.1673 11.6237 14.1673 10.6663V9.99967C14.1673 9.04301 14.166 8.37567 14.0986 7.87167C14.0326 7.38301 13.912 7.12367 13.728 6.93901C13.5653 6.77701 13.3467 6.66567 12.9693 6.59567C12.5766 6.52367 12.06 6.50501 11.3313 6.50101C11.2657 6.50066 11.2007 6.48738 11.1402 6.46193C11.0796 6.43648 11.0247 6.39935 10.9785 6.35268C10.9324 6.306 10.8958 6.25068 10.871 6.18989C10.8462 6.12909 10.8336 6.064 10.834 5.99834C10.8343 5.93268 10.8476 5.86773 10.8731 5.8072C10.8985 5.74667 10.9356 5.69175 10.9823 5.64557C11.029 5.59939 11.0843 5.56285 11.1451 5.53805C11.2059 5.51324 11.271 5.50066 11.3366 5.50101C12.058 5.50501 12.6587 5.52234 13.15 5.61234C13.6553 5.70567 14.0853 5.88234 14.4353 6.23234C14.8367 6.63301 15.0087 7.13901 15.09 7.73901C15.1673 8.31634 15.1673 9.05167 15.1673 9.96301V10.703C15.1673 11.615 15.1673 12.3497 15.09 12.9277C15.0087 13.5277 14.8367 14.033 14.4353 14.4343C14.034 14.8357 13.5287 15.0077 12.9287 15.089C12.3507 15.1663 11.6153 15.1663 10.704 15.1663H5.29732C4.38598 15.1663 3.65065 15.1663 3.07265 15.089C2.47265 15.0083 1.96732 14.8357 1.56598 14.4343C1.16465 14.033 0.992651 13.5277 0.911984 12.9277C0.833984 12.3497 0.833984 11.6143 0.833984 10.703V9.96301C0.833984 9.05167 0.833984 8.31634 0.911984 7.73834C0.991984 7.13834 1.16532 6.63301 1.56598 6.23167C1.91598 5.88234 2.34598 5.70501 2.85132 5.61234C3.34265 5.52234 3.94332 5.50501 4.66465 5.50101Z" fill="#868686"/>
</g>
<defs>
<clipPath id="clip0_2867_6271">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg> </button>                                                      
                          </td>
                                          
<td>
                <!--<div class="dropdown">-->
                <!--    <button onclick="toggleDropdown()" class="dropbtn show_pp">-->
                <!--        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--</div>               -->

            </td>


                        </tr>    


                         <tr class="Resolutions">
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>Non Disclosure Agreement</td>                                                              
                             <td><span id="total-sizeboardreso-td">{{$totalSizeKBemponboardnda}} KB</span> </td>
                              <td> 
                            <div class="type_number getparm" data-location=""" data-bs-toggle="modal" data-bs-target="#Non_Disclosure_Agreement_count" id="Non_Disclosure_Agreement_countt">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 1.834C10.79 1.756 10.162 1.75 9.03 1.75C7.113 1.75 5.75 1.752 4.718 1.89C3.706 2.025 3.125 2.28 2.702 2.702C2.279 3.125 2.025 3.705 1.89 4.711C1.752 5.739 1.75 7.093 1.75 9.001V13.001C1.75 14.907 1.752 16.261 1.89 17.289C2.025 18.295 2.279 18.875 2.702 19.299C3.125 19.721 3.705 19.975 4.711 20.11C5.739 20.249 7.093 20.25 9 20.25H13C14.907 20.25 16.262 20.248 17.29 20.11C18.295 19.975 18.875 19.721 19.298 19.298C19.721 18.875 19.975 18.295 20.11 17.289C20.248 16.262 20.25 14.907 20.25 13V12.563C20.25 11.027 20.24 10.299 20.076 9.75H16.946C15.813 9.75 14.888 9.75 14.156 9.652C13.393 9.549 12.731 9.327 12.202 8.798C11.673 8.269 11.451 7.608 11.348 6.843C11.25 6.113 11.25 5.187 11.25 4.053V1.834ZM12.75 2.61V4C12.75 5.2 12.752 6.024 12.835 6.643C12.915 7.241 13.059 7.534 13.263 7.737C13.466 7.941 13.759 8.085 14.357 8.165C14.976 8.248 15.8 8.25 17 8.25H19.02C18.6363 7.88459 18.2462 7.52587 17.85 7.174L13.891 3.611C13.5175 3.26961 13.1371 2.93587 12.75 2.61ZM9.175 0.25C10.56 0.25 11.455 0.25 12.278 0.565C13.101 0.881 13.763 1.477 14.788 2.4L14.895 2.496L18.853 6.059L18.978 6.171C20.162 7.236 20.928 7.925 21.339 8.849C21.751 9.773 21.751 10.803 21.75 12.395V13.056C21.75 14.894 21.75 16.35 21.597 17.489C21.439 18.661 21.107 19.61 20.359 20.359C19.61 21.107 18.661 21.439 17.489 21.597C16.349 21.75 14.894 21.75 13.056 21.75H8.944C7.106 21.75 5.65 21.75 4.511 21.597C3.339 21.439 2.39 21.107 1.641 20.359C0.893 19.61 0.561 18.661 0.403 17.489C0.25 16.349 0.25 14.894 0.25 13.056V8.945C0.25 7.107 0.25 5.651 0.403 4.512C0.561 3.34 0.893 2.391 1.641 1.642C2.391 0.893 3.342 0.562 4.519 0.404C5.663 0.251 7.126 0.251 8.974 0.251H9.03L9.175 0.25Z" fill="#ABABAB"/>
</svg>
<span class="cpoont"><span id="entries-countboardreso-td">{{$countemponboardnda}}</span></span>
                            </div>

                            </td>
 
                          <td>
                           
                            <button class="btndd hidebdnotice getparm" style="border-radius:5px;"   data-bs-toggle="modal" data-bs-target="#common_file_upload_pop" data-location="" data-real-file-name="Non Disclosure Agreement">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2867_6271)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00065 0.833008C8.07284 0.832962 8.14419 0.848551 8.20979 0.878702C8.27539 0.908854 8.33368 0.952853 8.38065 1.00767L10.3807 3.34101C10.4669 3.44179 10.5096 3.57272 10.4994 3.705C10.4891 3.83727 10.4268 3.96006 10.326 4.04634C10.2252 4.13262 10.0943 4.17534 9.962 4.16509C9.82972 4.15483 9.70693 4.09246 9.62065 3.99167L8.50065 2.68501V9.99967C8.50065 10.1323 8.44797 10.2595 8.3542 10.3532C8.26044 10.447 8.13326 10.4997 8.00065 10.4997C7.86804 10.4997 7.74087 10.447 7.6471 10.3532C7.55333 10.2595 7.50065 10.1323 7.50065 9.99967V2.68434L6.38065 3.99167C6.33793 4.04158 6.28579 4.08258 6.22723 4.11233C6.16866 4.14208 6.1048 4.16001 6.03931 4.16509C5.97381 4.17016 5.90796 4.16229 5.8455 4.14191C5.78305 4.12154 5.72522 4.08906 5.67532 4.04634C5.62542 4.00362 5.58442 3.95148 5.55466 3.89292C5.52491 3.83435 5.50698 3.77049 5.5019 3.705C5.49683 3.6395 5.5047 3.57365 5.52508 3.51119C5.54545 3.44874 5.57793 3.39091 5.62065 3.34101L7.62065 1.00767C7.66763 0.952853 7.72591 0.908854 7.79151 0.878702C7.85711 0.848551 7.92846 0.832962 8.00065 0.833008ZM4.66465 5.50101C4.79726 5.5003 4.92472 5.5523 5.01899 5.64557C5.11325 5.73884 5.16661 5.86573 5.16732 5.99834C5.16802 6.13095 5.11602 6.25841 5.02276 6.35268C4.92949 6.44694 4.80259 6.5003 4.66998 6.50101C3.94132 6.50501 3.42465 6.52367 3.03198 6.59567C2.65465 6.66567 2.43532 6.77701 2.27332 6.93901C2.08865 7.12367 1.96865 7.38301 1.90265 7.87234C1.83532 8.37567 1.83398 9.04301 1.83398 9.99967V10.6663C1.83398 11.6237 1.83532 12.291 1.90265 12.7943C1.96865 13.2837 2.08932 13.5423 2.27332 13.7277C2.45798 13.9117 2.71665 14.0317 3.20665 14.0977C3.70932 14.1657 4.37732 14.1663 5.33398 14.1663H10.6673C11.624 14.1663 12.2913 14.1657 12.7953 14.0977C13.2846 14.0317 13.5433 13.9117 13.728 13.727C13.9127 13.5423 14.0326 13.2837 14.0986 12.7943C14.166 12.291 14.1673 11.6237 14.1673 10.6663V9.99967C14.1673 9.04301 14.166 8.37567 14.0986 7.87167C14.0326 7.38301 13.912 7.12367 13.728 6.93901C13.5653 6.77701 13.3467 6.66567 12.9693 6.59567C12.5766 6.52367 12.06 6.50501 11.3313 6.50101C11.2657 6.50066 11.2007 6.48738 11.1402 6.46193C11.0796 6.43648 11.0247 6.39935 10.9785 6.35268C10.9324 6.306 10.8958 6.25068 10.871 6.18989C10.8462 6.12909 10.8336 6.064 10.834 5.99834C10.8343 5.93268 10.8476 5.86773 10.8731 5.8072C10.8985 5.74667 10.9356 5.69175 10.9823 5.64557C11.029 5.59939 11.0843 5.56285 11.1451 5.53805C11.2059 5.51324 11.271 5.50066 11.3366 5.50101C12.058 5.50501 12.6587 5.52234 13.15 5.61234C13.6553 5.70567 14.0853 5.88234 14.4353 6.23234C14.8367 6.63301 15.0087 7.13901 15.09 7.73901C15.1673 8.31634 15.1673 9.05167 15.1673 9.96301V10.703C15.1673 11.615 15.1673 12.3497 15.09 12.9277C15.0087 13.5277 14.8367 14.033 14.4353 14.4343C14.034 14.8357 13.5287 15.0077 12.9287 15.089C12.3507 15.1663 11.6153 15.1663 10.704 15.1663H5.29732C4.38598 15.1663 3.65065 15.1663 3.07265 15.089C2.47265 15.0083 1.96732 14.8357 1.56598 14.4343C1.16465 14.033 0.992651 13.5277 0.911984 12.9277C0.833984 12.3497 0.833984 11.6143 0.833984 10.703V9.96301C0.833984 9.05167 0.833984 8.31634 0.911984 7.73834C0.991984 7.13834 1.16532 6.63301 1.56598 6.23167C1.91598 5.88234 2.34598 5.70501 2.85132 5.61234C3.34265 5.52234 3.94332 5.50501 4.66465 5.50101Z" fill="#868686"/>
</g>
<defs>
<clipPath id="clip0_2867_6271">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg> </button>                                                      
                          </td>
                                          
<td>
                <!--<div class="dropdown">-->
                <!--    <button onclick="toggleDropdown()" class="dropbtn show_pp">-->
                <!--        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--</div>               -->

            </td>


                        </tr>  
                        
                        
                        <tr class="Non-compete">
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>Non-compete</td>                                                              
                             <td><span id="total-sizeboardreso-td">{{$totalSizeKBemponboardnc}} KB</span> </td>
                              <td> 
                            <div class="type_number getparm" data-location="" data-bs-toggle="modal" data-bs-target="#Non_compete_count" id="Non_compete_countt">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 1.834C10.79 1.756 10.162 1.75 9.03 1.75C7.113 1.75 5.75 1.752 4.718 1.89C3.706 2.025 3.125 2.28 2.702 2.702C2.279 3.125 2.025 3.705 1.89 4.711C1.752 5.739 1.75 7.093 1.75 9.001V13.001C1.75 14.907 1.752 16.261 1.89 17.289C2.025 18.295 2.279 18.875 2.702 19.299C3.125 19.721 3.705 19.975 4.711 20.11C5.739 20.249 7.093 20.25 9 20.25H13C14.907 20.25 16.262 20.248 17.29 20.11C18.295 19.975 18.875 19.721 19.298 19.298C19.721 18.875 19.975 18.295 20.11 17.289C20.248 16.262 20.25 14.907 20.25 13V12.563C20.25 11.027 20.24 10.299 20.076 9.75H16.946C15.813 9.75 14.888 9.75 14.156 9.652C13.393 9.549 12.731 9.327 12.202 8.798C11.673 8.269 11.451 7.608 11.348 6.843C11.25 6.113 11.25 5.187 11.25 4.053V1.834ZM12.75 2.61V4C12.75 5.2 12.752 6.024 12.835 6.643C12.915 7.241 13.059 7.534 13.263 7.737C13.466 7.941 13.759 8.085 14.357 8.165C14.976 8.248 15.8 8.25 17 8.25H19.02C18.6363 7.88459 18.2462 7.52587 17.85 7.174L13.891 3.611C13.5175 3.26961 13.1371 2.93587 12.75 2.61ZM9.175 0.25C10.56 0.25 11.455 0.25 12.278 0.565C13.101 0.881 13.763 1.477 14.788 2.4L14.895 2.496L18.853 6.059L18.978 6.171C20.162 7.236 20.928 7.925 21.339 8.849C21.751 9.773 21.751 10.803 21.75 12.395V13.056C21.75 14.894 21.75 16.35 21.597 17.489C21.439 18.661 21.107 19.61 20.359 20.359C19.61 21.107 18.661 21.439 17.489 21.597C16.349 21.75 14.894 21.75 13.056 21.75H8.944C7.106 21.75 5.65 21.75 4.511 21.597C3.339 21.439 2.39 21.107 1.641 20.359C0.893 19.61 0.561 18.661 0.403 17.489C0.25 16.349 0.25 14.894 0.25 13.056V8.945C0.25 7.107 0.25 5.651 0.403 4.512C0.561 3.34 0.893 2.391 1.641 1.642C2.391 0.893 3.342 0.562 4.519 0.404C5.663 0.251 7.126 0.251 8.974 0.251H9.03L9.175 0.25Z" fill="#ABABAB"/>
</svg>
<span class="cpoont"><span id="entries-countboardreso-td">{{$countemponboardnc}}</span></span>
                            </div>

                            </td>
 
                          <td>
                           
                           <button class="btndd hidebdnotice getparm" style="border-radius:5px;"   data-bs-toggle="modal" data-bs-target="#common_file_upload_pop" data-location="" data-real-file-name="Non-compete">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2867_6271)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00065 0.833008C8.07284 0.832962 8.14419 0.848551 8.20979 0.878702C8.27539 0.908854 8.33368 0.952853 8.38065 1.00767L10.3807 3.34101C10.4669 3.44179 10.5096 3.57272 10.4994 3.705C10.4891 3.83727 10.4268 3.96006 10.326 4.04634C10.2252 4.13262 10.0943 4.17534 9.962 4.16509C9.82972 4.15483 9.70693 4.09246 9.62065 3.99167L8.50065 2.68501V9.99967C8.50065 10.1323 8.44797 10.2595 8.3542 10.3532C8.26044 10.447 8.13326 10.4997 8.00065 10.4997C7.86804 10.4997 7.74087 10.447 7.6471 10.3532C7.55333 10.2595 7.50065 10.1323 7.50065 9.99967V2.68434L6.38065 3.99167C6.33793 4.04158 6.28579 4.08258 6.22723 4.11233C6.16866 4.14208 6.1048 4.16001 6.03931 4.16509C5.97381 4.17016 5.90796 4.16229 5.8455 4.14191C5.78305 4.12154 5.72522 4.08906 5.67532 4.04634C5.62542 4.00362 5.58442 3.95148 5.55466 3.89292C5.52491 3.83435 5.50698 3.77049 5.5019 3.705C5.49683 3.6395 5.5047 3.57365 5.52508 3.51119C5.54545 3.44874 5.57793 3.39091 5.62065 3.34101L7.62065 1.00767C7.66763 0.952853 7.72591 0.908854 7.79151 0.878702C7.85711 0.848551 7.92846 0.832962 8.00065 0.833008ZM4.66465 5.50101C4.79726 5.5003 4.92472 5.5523 5.01899 5.64557C5.11325 5.73884 5.16661 5.86573 5.16732 5.99834C5.16802 6.13095 5.11602 6.25841 5.02276 6.35268C4.92949 6.44694 4.80259 6.5003 4.66998 6.50101C3.94132 6.50501 3.42465 6.52367 3.03198 6.59567C2.65465 6.66567 2.43532 6.77701 2.27332 6.93901C2.08865 7.12367 1.96865 7.38301 1.90265 7.87234C1.83532 8.37567 1.83398 9.04301 1.83398 9.99967V10.6663C1.83398 11.6237 1.83532 12.291 1.90265 12.7943C1.96865 13.2837 2.08932 13.5423 2.27332 13.7277C2.45798 13.9117 2.71665 14.0317 3.20665 14.0977C3.70932 14.1657 4.37732 14.1663 5.33398 14.1663H10.6673C11.624 14.1663 12.2913 14.1657 12.7953 14.0977C13.2846 14.0317 13.5433 13.9117 13.728 13.727C13.9127 13.5423 14.0326 13.2837 14.0986 12.7943C14.166 12.291 14.1673 11.6237 14.1673 10.6663V9.99967C14.1673 9.04301 14.166 8.37567 14.0986 7.87167C14.0326 7.38301 13.912 7.12367 13.728 6.93901C13.5653 6.77701 13.3467 6.66567 12.9693 6.59567C12.5766 6.52367 12.06 6.50501 11.3313 6.50101C11.2657 6.50066 11.2007 6.48738 11.1402 6.46193C11.0796 6.43648 11.0247 6.39935 10.9785 6.35268C10.9324 6.306 10.8958 6.25068 10.871 6.18989C10.8462 6.12909 10.8336 6.064 10.834 5.99834C10.8343 5.93268 10.8476 5.86773 10.8731 5.8072C10.8985 5.74667 10.9356 5.69175 10.9823 5.64557C11.029 5.59939 11.0843 5.56285 11.1451 5.53805C11.2059 5.51324 11.271 5.50066 11.3366 5.50101C12.058 5.50501 12.6587 5.52234 13.15 5.61234C13.6553 5.70567 14.0853 5.88234 14.4353 6.23234C14.8367 6.63301 15.0087 7.13901 15.09 7.73901C15.1673 8.31634 15.1673 9.05167 15.1673 9.96301V10.703C15.1673 11.615 15.1673 12.3497 15.09 12.9277C15.0087 13.5277 14.8367 14.033 14.4353 14.4343C14.034 14.8357 13.5287 15.0077 12.9287 15.089C12.3507 15.1663 11.6153 15.1663 10.704 15.1663H5.29732C4.38598 15.1663 3.65065 15.1663 3.07265 15.089C2.47265 15.0083 1.96732 14.8357 1.56598 14.4343C1.16465 14.033 0.992651 13.5277 0.911984 12.9277C0.833984 12.3497 0.833984 11.6143 0.833984 10.703V9.96301C0.833984 9.05167 0.833984 8.31634 0.911984 7.73834C0.991984 7.13834 1.16532 6.63301 1.56598 6.23167C1.91598 5.88234 2.34598 5.70501 2.85132 5.61234C3.34265 5.52234 3.94332 5.50501 4.66465 5.50101Z" fill="#868686"/>
</g>
<defs>
<clipPath id="clip0_2867_6271">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg> </button>                                                      
                          </td>
                                          
<td>
                <!--<div class="dropdown">-->
                <!--    <button onclick="toggleDropdown()" class="dropbtn show_pp">-->
                <!--        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--</div>               -->

            </td>


                        </tr>  

                        <tr class="Contractual Bond">
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>Contractual Bond</td>                                                              
                             <td><span id="total-sizeboardreso-td">{{$totalSizeKBemponboardcb}} KB</span> </td>
                              <td> 
                            <div class="type_number getparm" data-location=""  data-bs-toggle="modal" data-bs-target="#Contractual_Bond_count" id="Contractual_Bond_countt">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 1.834C10.79 1.756 10.162 1.75 9.03 1.75C7.113 1.75 5.75 1.752 4.718 1.89C3.706 2.025 3.125 2.28 2.702 2.702C2.279 3.125 2.025 3.705 1.89 4.711C1.752 5.739 1.75 7.093 1.75 9.001V13.001C1.75 14.907 1.752 16.261 1.89 17.289C2.025 18.295 2.279 18.875 2.702 19.299C3.125 19.721 3.705 19.975 4.711 20.11C5.739 20.249 7.093 20.25 9 20.25H13C14.907 20.25 16.262 20.248 17.29 20.11C18.295 19.975 18.875 19.721 19.298 19.298C19.721 18.875 19.975 18.295 20.11 17.289C20.248 16.262 20.25 14.907 20.25 13V12.563C20.25 11.027 20.24 10.299 20.076 9.75H16.946C15.813 9.75 14.888 9.75 14.156 9.652C13.393 9.549 12.731 9.327 12.202 8.798C11.673 8.269 11.451 7.608 11.348 6.843C11.25 6.113 11.25 5.187 11.25 4.053V1.834ZM12.75 2.61V4C12.75 5.2 12.752 6.024 12.835 6.643C12.915 7.241 13.059 7.534 13.263 7.737C13.466 7.941 13.759 8.085 14.357 8.165C14.976 8.248 15.8 8.25 17 8.25H19.02C18.6363 7.88459 18.2462 7.52587 17.85 7.174L13.891 3.611C13.5175 3.26961 13.1371 2.93587 12.75 2.61ZM9.175 0.25C10.56 0.25 11.455 0.25 12.278 0.565C13.101 0.881 13.763 1.477 14.788 2.4L14.895 2.496L18.853 6.059L18.978 6.171C20.162 7.236 20.928 7.925 21.339 8.849C21.751 9.773 21.751 10.803 21.75 12.395V13.056C21.75 14.894 21.75 16.35 21.597 17.489C21.439 18.661 21.107 19.61 20.359 20.359C19.61 21.107 18.661 21.439 17.489 21.597C16.349 21.75 14.894 21.75 13.056 21.75H8.944C7.106 21.75 5.65 21.75 4.511 21.597C3.339 21.439 2.39 21.107 1.641 20.359C0.893 19.61 0.561 18.661 0.403 17.489C0.25 16.349 0.25 14.894 0.25 13.056V8.945C0.25 7.107 0.25 5.651 0.403 4.512C0.561 3.34 0.893 2.391 1.641 1.642C2.391 0.893 3.342 0.562 4.519 0.404C5.663 0.251 7.126 0.251 8.974 0.251H9.03L9.175 0.25Z" fill="#ABABAB"/>
</svg>
<span class="cpoont"><span id="entries-countboardreso-td">{{$countemponboardcb}}</span></span>
                            </div>

                            </td>
 
                          <td>
                           
                            <button class="btndd hidebdnotice getparm" style="border-radius:5px;"   data-bs-toggle="modal" data-bs-target="#common_file_upload_pop" data-location="" data-real-file-name="Contractual Bond">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2867_6271)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00065 0.833008C8.07284 0.832962 8.14419 0.848551 8.20979 0.878702C8.27539 0.908854 8.33368 0.952853 8.38065 1.00767L10.3807 3.34101C10.4669 3.44179 10.5096 3.57272 10.4994 3.705C10.4891 3.83727 10.4268 3.96006 10.326 4.04634C10.2252 4.13262 10.0943 4.17534 9.962 4.16509C9.82972 4.15483 9.70693 4.09246 9.62065 3.99167L8.50065 2.68501V9.99967C8.50065 10.1323 8.44797 10.2595 8.3542 10.3532C8.26044 10.447 8.13326 10.4997 8.00065 10.4997C7.86804 10.4997 7.74087 10.447 7.6471 10.3532C7.55333 10.2595 7.50065 10.1323 7.50065 9.99967V2.68434L6.38065 3.99167C6.33793 4.04158 6.28579 4.08258 6.22723 4.11233C6.16866 4.14208 6.1048 4.16001 6.03931 4.16509C5.97381 4.17016 5.90796 4.16229 5.8455 4.14191C5.78305 4.12154 5.72522 4.08906 5.67532 4.04634C5.62542 4.00362 5.58442 3.95148 5.55466 3.89292C5.52491 3.83435 5.50698 3.77049 5.5019 3.705C5.49683 3.6395 5.5047 3.57365 5.52508 3.51119C5.54545 3.44874 5.57793 3.39091 5.62065 3.34101L7.62065 1.00767C7.66763 0.952853 7.72591 0.908854 7.79151 0.878702C7.85711 0.848551 7.92846 0.832962 8.00065 0.833008ZM4.66465 5.50101C4.79726 5.5003 4.92472 5.5523 5.01899 5.64557C5.11325 5.73884 5.16661 5.86573 5.16732 5.99834C5.16802 6.13095 5.11602 6.25841 5.02276 6.35268C4.92949 6.44694 4.80259 6.5003 4.66998 6.50101C3.94132 6.50501 3.42465 6.52367 3.03198 6.59567C2.65465 6.66567 2.43532 6.77701 2.27332 6.93901C2.08865 7.12367 1.96865 7.38301 1.90265 7.87234C1.83532 8.37567 1.83398 9.04301 1.83398 9.99967V10.6663C1.83398 11.6237 1.83532 12.291 1.90265 12.7943C1.96865 13.2837 2.08932 13.5423 2.27332 13.7277C2.45798 13.9117 2.71665 14.0317 3.20665 14.0977C3.70932 14.1657 4.37732 14.1663 5.33398 14.1663H10.6673C11.624 14.1663 12.2913 14.1657 12.7953 14.0977C13.2846 14.0317 13.5433 13.9117 13.728 13.727C13.9127 13.5423 14.0326 13.2837 14.0986 12.7943C14.166 12.291 14.1673 11.6237 14.1673 10.6663V9.99967C14.1673 9.04301 14.166 8.37567 14.0986 7.87167C14.0326 7.38301 13.912 7.12367 13.728 6.93901C13.5653 6.77701 13.3467 6.66567 12.9693 6.59567C12.5766 6.52367 12.06 6.50501 11.3313 6.50101C11.2657 6.50066 11.2007 6.48738 11.1402 6.46193C11.0796 6.43648 11.0247 6.39935 10.9785 6.35268C10.9324 6.306 10.8958 6.25068 10.871 6.18989C10.8462 6.12909 10.8336 6.064 10.834 5.99834C10.8343 5.93268 10.8476 5.86773 10.8731 5.8072C10.8985 5.74667 10.9356 5.69175 10.9823 5.64557C11.029 5.59939 11.0843 5.56285 11.1451 5.53805C11.2059 5.51324 11.271 5.50066 11.3366 5.50101C12.058 5.50501 12.6587 5.52234 13.15 5.61234C13.6553 5.70567 14.0853 5.88234 14.4353 6.23234C14.8367 6.63301 15.0087 7.13901 15.09 7.73901C15.1673 8.31634 15.1673 9.05167 15.1673 9.96301V10.703C15.1673 11.615 15.1673 12.3497 15.09 12.9277C15.0087 13.5277 14.8367 14.033 14.4353 14.4343C14.034 14.8357 13.5287 15.0077 12.9287 15.089C12.3507 15.1663 11.6153 15.1663 10.704 15.1663H5.29732C4.38598 15.1663 3.65065 15.1663 3.07265 15.089C2.47265 15.0083 1.96732 14.8357 1.56598 14.4343C1.16465 14.033 0.992651 13.5277 0.911984 12.9277C0.833984 12.3497 0.833984 11.6143 0.833984 10.703V9.96301C0.833984 9.05167 0.833984 8.31634 0.911984 7.73834C0.991984 7.13834 1.16532 6.63301 1.56598 6.23167C1.91598 5.88234 2.34598 5.70501 2.85132 5.61234C3.34265 5.52234 3.94332 5.50501 4.66465 5.50101Z" fill="#868686"/>
</g>
<defs>
<clipPath id="clip0_2867_6271">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg> </button>                                                      
                          </td>
                                          
<td>
                <!--<div class="dropdown">-->
                <!--    <button onclick="toggleDropdown()" class="dropbtn show_pp">-->
                <!--        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--</div>               -->

            </td>


                        </tr>
                        
                        
                        <tr class="Form 11 - EPF">
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>Form 11 - EPF</td>                                                              
                             <td><span id="total-sizeboardreso-td">{{$totalSizeKBemponboardepf}} KB</span> </td>
                              <td> 
                            <div class="type_number getparm" data-location=""data-bs-toggle="modal" data-bs-target="#Form_11_EPF_count" id="Form_11_EPF_countt">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 1.834C10.79 1.756 10.162 1.75 9.03 1.75C7.113 1.75 5.75 1.752 4.718 1.89C3.706 2.025 3.125 2.28 2.702 2.702C2.279 3.125 2.025 3.705 1.89 4.711C1.752 5.739 1.75 7.093 1.75 9.001V13.001C1.75 14.907 1.752 16.261 1.89 17.289C2.025 18.295 2.279 18.875 2.702 19.299C3.125 19.721 3.705 19.975 4.711 20.11C5.739 20.249 7.093 20.25 9 20.25H13C14.907 20.25 16.262 20.248 17.29 20.11C18.295 19.975 18.875 19.721 19.298 19.298C19.721 18.875 19.975 18.295 20.11 17.289C20.248 16.262 20.25 14.907 20.25 13V12.563C20.25 11.027 20.24 10.299 20.076 9.75H16.946C15.813 9.75 14.888 9.75 14.156 9.652C13.393 9.549 12.731 9.327 12.202 8.798C11.673 8.269 11.451 7.608 11.348 6.843C11.25 6.113 11.25 5.187 11.25 4.053V1.834ZM12.75 2.61V4C12.75 5.2 12.752 6.024 12.835 6.643C12.915 7.241 13.059 7.534 13.263 7.737C13.466 7.941 13.759 8.085 14.357 8.165C14.976 8.248 15.8 8.25 17 8.25H19.02C18.6363 7.88459 18.2462 7.52587 17.85 7.174L13.891 3.611C13.5175 3.26961 13.1371 2.93587 12.75 2.61ZM9.175 0.25C10.56 0.25 11.455 0.25 12.278 0.565C13.101 0.881 13.763 1.477 14.788 2.4L14.895 2.496L18.853 6.059L18.978 6.171C20.162 7.236 20.928 7.925 21.339 8.849C21.751 9.773 21.751 10.803 21.75 12.395V13.056C21.75 14.894 21.75 16.35 21.597 17.489C21.439 18.661 21.107 19.61 20.359 20.359C19.61 21.107 18.661 21.439 17.489 21.597C16.349 21.75 14.894 21.75 13.056 21.75H8.944C7.106 21.75 5.65 21.75 4.511 21.597C3.339 21.439 2.39 21.107 1.641 20.359C0.893 19.61 0.561 18.661 0.403 17.489C0.25 16.349 0.25 14.894 0.25 13.056V8.945C0.25 7.107 0.25 5.651 0.403 4.512C0.561 3.34 0.893 2.391 1.641 1.642C2.391 0.893 3.342 0.562 4.519 0.404C5.663 0.251 7.126 0.251 8.974 0.251H9.03L9.175 0.25Z" fill="#ABABAB"/>
</svg>
<span class="cpoont"><span id="entries-countboardreso-td">{{$countemponboardepf}}</span></span>
                            </div>

                            </td>
 
                          <td>
                           
                           <button class="btndd hidebdnotice getparm" style="border-radius:5px;"   data-bs-toggle="modal" data-bs-target="#common_file_upload_pop" data-location="" data-real-file-name="Form 11 - EPF">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2867_6271)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00065 0.833008C8.07284 0.832962 8.14419 0.848551 8.20979 0.878702C8.27539 0.908854 8.33368 0.952853 8.38065 1.00767L10.3807 3.34101C10.4669 3.44179 10.5096 3.57272 10.4994 3.705C10.4891 3.83727 10.4268 3.96006 10.326 4.04634C10.2252 4.13262 10.0943 4.17534 9.962 4.16509C9.82972 4.15483 9.70693 4.09246 9.62065 3.99167L8.50065 2.68501V9.99967C8.50065 10.1323 8.44797 10.2595 8.3542 10.3532C8.26044 10.447 8.13326 10.4997 8.00065 10.4997C7.86804 10.4997 7.74087 10.447 7.6471 10.3532C7.55333 10.2595 7.50065 10.1323 7.50065 9.99967V2.68434L6.38065 3.99167C6.33793 4.04158 6.28579 4.08258 6.22723 4.11233C6.16866 4.14208 6.1048 4.16001 6.03931 4.16509C5.97381 4.17016 5.90796 4.16229 5.8455 4.14191C5.78305 4.12154 5.72522 4.08906 5.67532 4.04634C5.62542 4.00362 5.58442 3.95148 5.55466 3.89292C5.52491 3.83435 5.50698 3.77049 5.5019 3.705C5.49683 3.6395 5.5047 3.57365 5.52508 3.51119C5.54545 3.44874 5.57793 3.39091 5.62065 3.34101L7.62065 1.00767C7.66763 0.952853 7.72591 0.908854 7.79151 0.878702C7.85711 0.848551 7.92846 0.832962 8.00065 0.833008ZM4.66465 5.50101C4.79726 5.5003 4.92472 5.5523 5.01899 5.64557C5.11325 5.73884 5.16661 5.86573 5.16732 5.99834C5.16802 6.13095 5.11602 6.25841 5.02276 6.35268C4.92949 6.44694 4.80259 6.5003 4.66998 6.50101C3.94132 6.50501 3.42465 6.52367 3.03198 6.59567C2.65465 6.66567 2.43532 6.77701 2.27332 6.93901C2.08865 7.12367 1.96865 7.38301 1.90265 7.87234C1.83532 8.37567 1.83398 9.04301 1.83398 9.99967V10.6663C1.83398 11.6237 1.83532 12.291 1.90265 12.7943C1.96865 13.2837 2.08932 13.5423 2.27332 13.7277C2.45798 13.9117 2.71665 14.0317 3.20665 14.0977C3.70932 14.1657 4.37732 14.1663 5.33398 14.1663H10.6673C11.624 14.1663 12.2913 14.1657 12.7953 14.0977C13.2846 14.0317 13.5433 13.9117 13.728 13.727C13.9127 13.5423 14.0326 13.2837 14.0986 12.7943C14.166 12.291 14.1673 11.6237 14.1673 10.6663V9.99967C14.1673 9.04301 14.166 8.37567 14.0986 7.87167C14.0326 7.38301 13.912 7.12367 13.728 6.93901C13.5653 6.77701 13.3467 6.66567 12.9693 6.59567C12.5766 6.52367 12.06 6.50501 11.3313 6.50101C11.2657 6.50066 11.2007 6.48738 11.1402 6.46193C11.0796 6.43648 11.0247 6.39935 10.9785 6.35268C10.9324 6.306 10.8958 6.25068 10.871 6.18989C10.8462 6.12909 10.8336 6.064 10.834 5.99834C10.8343 5.93268 10.8476 5.86773 10.8731 5.8072C10.8985 5.74667 10.9356 5.69175 10.9823 5.64557C11.029 5.59939 11.0843 5.56285 11.1451 5.53805C11.2059 5.51324 11.271 5.50066 11.3366 5.50101C12.058 5.50501 12.6587 5.52234 13.15 5.61234C13.6553 5.70567 14.0853 5.88234 14.4353 6.23234C14.8367 6.63301 15.0087 7.13901 15.09 7.73901C15.1673 8.31634 15.1673 9.05167 15.1673 9.96301V10.703C15.1673 11.615 15.1673 12.3497 15.09 12.9277C15.0087 13.5277 14.8367 14.033 14.4353 14.4343C14.034 14.8357 13.5287 15.0077 12.9287 15.089C12.3507 15.1663 11.6153 15.1663 10.704 15.1663H5.29732C4.38598 15.1663 3.65065 15.1663 3.07265 15.089C2.47265 15.0083 1.96732 14.8357 1.56598 14.4343C1.16465 14.033 0.992651 13.5277 0.911984 12.9277C0.833984 12.3497 0.833984 11.6143 0.833984 10.703V9.96301C0.833984 9.05167 0.833984 8.31634 0.911984 7.73834C0.991984 7.13834 1.16532 6.63301 1.56598 6.23167C1.91598 5.88234 2.34598 5.70501 2.85132 5.61234C3.34265 5.52234 3.94332 5.50501 4.66465 5.50101Z" fill="#868686"/>
</g>
<defs>
<clipPath id="clip0_2867_6271">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg> </button>                                                      
                          </td>
                                          
<td>
                <!--<div class="dropdown">-->
                <!--    <button onclick="toggleDropdown()" class="dropbtn show_pp">-->
                <!--        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--</div>               -->

            </td>


                        </tr>

                        <tr class="Form 12BB - Income Tax">
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>Form 12BB - Income Tax</td>                                                              
                             <td><span id="total-sizeboardreso-td">{{$totalSizeKBemponboardincometax}} KB</span> </td>
                              <td> 
                            <div class="type_number getparm" data-location="" data-bs-toggle="modal" data-bs-target="#Form_12BB_Income_Tax_count" id="Form_12BB_Income_Tax_countt">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 1.834C10.79 1.756 10.162 1.75 9.03 1.75C7.113 1.75 5.75 1.752 4.718 1.89C3.706 2.025 3.125 2.28 2.702 2.702C2.279 3.125 2.025 3.705 1.89 4.711C1.752 5.739 1.75 7.093 1.75 9.001V13.001C1.75 14.907 1.752 16.261 1.89 17.289C2.025 18.295 2.279 18.875 2.702 19.299C3.125 19.721 3.705 19.975 4.711 20.11C5.739 20.249 7.093 20.25 9 20.25H13C14.907 20.25 16.262 20.248 17.29 20.11C18.295 19.975 18.875 19.721 19.298 19.298C19.721 18.875 19.975 18.295 20.11 17.289C20.248 16.262 20.25 14.907 20.25 13V12.563C20.25 11.027 20.24 10.299 20.076 9.75H16.946C15.813 9.75 14.888 9.75 14.156 9.652C13.393 9.549 12.731 9.327 12.202 8.798C11.673 8.269 11.451 7.608 11.348 6.843C11.25 6.113 11.25 5.187 11.25 4.053V1.834ZM12.75 2.61V4C12.75 5.2 12.752 6.024 12.835 6.643C12.915 7.241 13.059 7.534 13.263 7.737C13.466 7.941 13.759 8.085 14.357 8.165C14.976 8.248 15.8 8.25 17 8.25H19.02C18.6363 7.88459 18.2462 7.52587 17.85 7.174L13.891 3.611C13.5175 3.26961 13.1371 2.93587 12.75 2.61ZM9.175 0.25C10.56 0.25 11.455 0.25 12.278 0.565C13.101 0.881 13.763 1.477 14.788 2.4L14.895 2.496L18.853 6.059L18.978 6.171C20.162 7.236 20.928 7.925 21.339 8.849C21.751 9.773 21.751 10.803 21.75 12.395V13.056C21.75 14.894 21.75 16.35 21.597 17.489C21.439 18.661 21.107 19.61 20.359 20.359C19.61 21.107 18.661 21.439 17.489 21.597C16.349 21.75 14.894 21.75 13.056 21.75H8.944C7.106 21.75 5.65 21.75 4.511 21.597C3.339 21.439 2.39 21.107 1.641 20.359C0.893 19.61 0.561 18.661 0.403 17.489C0.25 16.349 0.25 14.894 0.25 13.056V8.945C0.25 7.107 0.25 5.651 0.403 4.512C0.561 3.34 0.893 2.391 1.641 1.642C2.391 0.893 3.342 0.562 4.519 0.404C5.663 0.251 7.126 0.251 8.974 0.251H9.03L9.175 0.25Z" fill="#ABABAB"/>
</svg>
<span class="cpoont"><span id="entries-countboardreso-td">{{$countemponboardincometax}}</span></span>
                            </div>

                            </td>
 
                          <td>
                           
                            <button class="btndd hidebdnotice getparm" style="border-radius:5px;"   data-bs-toggle="modal" data-bs-target="#common_file_upload_pop" data-location="" data-real-file-name="Form 12BB - Income Tax">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2867_6271)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.00065 0.833008C8.07284 0.832962 8.14419 0.848551 8.20979 0.878702C8.27539 0.908854 8.33368 0.952853 8.38065 1.00767L10.3807 3.34101C10.4669 3.44179 10.5096 3.57272 10.4994 3.705C10.4891 3.83727 10.4268 3.96006 10.326 4.04634C10.2252 4.13262 10.0943 4.17534 9.962 4.16509C9.82972 4.15483 9.70693 4.09246 9.62065 3.99167L8.50065 2.68501V9.99967C8.50065 10.1323 8.44797 10.2595 8.3542 10.3532C8.26044 10.447 8.13326 10.4997 8.00065 10.4997C7.86804 10.4997 7.74087 10.447 7.6471 10.3532C7.55333 10.2595 7.50065 10.1323 7.50065 9.99967V2.68434L6.38065 3.99167C6.33793 4.04158 6.28579 4.08258 6.22723 4.11233C6.16866 4.14208 6.1048 4.16001 6.03931 4.16509C5.97381 4.17016 5.90796 4.16229 5.8455 4.14191C5.78305 4.12154 5.72522 4.08906 5.67532 4.04634C5.62542 4.00362 5.58442 3.95148 5.55466 3.89292C5.52491 3.83435 5.50698 3.77049 5.5019 3.705C5.49683 3.6395 5.5047 3.57365 5.52508 3.51119C5.54545 3.44874 5.57793 3.39091 5.62065 3.34101L7.62065 1.00767C7.66763 0.952853 7.72591 0.908854 7.79151 0.878702C7.85711 0.848551 7.92846 0.832962 8.00065 0.833008ZM4.66465 5.50101C4.79726 5.5003 4.92472 5.5523 5.01899 5.64557C5.11325 5.73884 5.16661 5.86573 5.16732 5.99834C5.16802 6.13095 5.11602 6.25841 5.02276 6.35268C4.92949 6.44694 4.80259 6.5003 4.66998 6.50101C3.94132 6.50501 3.42465 6.52367 3.03198 6.59567C2.65465 6.66567 2.43532 6.77701 2.27332 6.93901C2.08865 7.12367 1.96865 7.38301 1.90265 7.87234C1.83532 8.37567 1.83398 9.04301 1.83398 9.99967V10.6663C1.83398 11.6237 1.83532 12.291 1.90265 12.7943C1.96865 13.2837 2.08932 13.5423 2.27332 13.7277C2.45798 13.9117 2.71665 14.0317 3.20665 14.0977C3.70932 14.1657 4.37732 14.1663 5.33398 14.1663H10.6673C11.624 14.1663 12.2913 14.1657 12.7953 14.0977C13.2846 14.0317 13.5433 13.9117 13.728 13.727C13.9127 13.5423 14.0326 13.2837 14.0986 12.7943C14.166 12.291 14.1673 11.6237 14.1673 10.6663V9.99967C14.1673 9.04301 14.166 8.37567 14.0986 7.87167C14.0326 7.38301 13.912 7.12367 13.728 6.93901C13.5653 6.77701 13.3467 6.66567 12.9693 6.59567C12.5766 6.52367 12.06 6.50501 11.3313 6.50101C11.2657 6.50066 11.2007 6.48738 11.1402 6.46193C11.0796 6.43648 11.0247 6.39935 10.9785 6.35268C10.9324 6.306 10.8958 6.25068 10.871 6.18989C10.8462 6.12909 10.8336 6.064 10.834 5.99834C10.8343 5.93268 10.8476 5.86773 10.8731 5.8072C10.8985 5.74667 10.9356 5.69175 10.9823 5.64557C11.029 5.59939 11.0843 5.56285 11.1451 5.53805C11.2059 5.51324 11.271 5.50066 11.3366 5.50101C12.058 5.50501 12.6587 5.52234 13.15 5.61234C13.6553 5.70567 14.0853 5.88234 14.4353 6.23234C14.8367 6.63301 15.0087 7.13901 15.09 7.73901C15.1673 8.31634 15.1673 9.05167 15.1673 9.96301V10.703C15.1673 11.615 15.1673 12.3497 15.09 12.9277C15.0087 13.5277 14.8367 14.033 14.4353 14.4343C14.034 14.8357 13.5287 15.0077 12.9287 15.089C12.3507 15.1663 11.6153 15.1663 10.704 15.1663H5.29732C4.38598 15.1663 3.65065 15.1663 3.07265 15.089C2.47265 15.0083 1.96732 14.8357 1.56598 14.4343C1.16465 14.033 0.992651 13.5277 0.911984 12.9277C0.833984 12.3497 0.833984 11.6143 0.833984 10.703V9.96301C0.833984 9.05167 0.833984 8.31634 0.911984 7.73834C0.991984 7.13834 1.16532 6.63301 1.56598 6.23167C1.91598 5.88234 2.34598 5.70501 2.85132 5.61234C3.34265 5.52234 3.94332 5.50501 4.66465 5.50101Z" fill="#868686"/>
</g>
<defs>
<clipPath id="clip0_2867_6271">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg> </button>                                                      
                          </td>
                                          
<td>
                <!--<div class="dropdown">-->
                <!--    <button onclick="toggleDropdown()" class="dropbtn show_pp">-->
                <!--        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>-->
                <!--            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--</div>               -->

            </td>


                        </tr>
                        
                        
            </tbody>
        </table>
        </div>


<!-- repeat me start -->

<!-- data show table model satrt Offer_Letter_count-->
    <div class="modal fade drop_coman_file have_title borde_show_fulll_data" id="Offer_Letter_count" tabindex="-1" role="dialog" aria-labelledby="Offer_Letter_count" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:700">Offer Letter</h5>
                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
                <!-- Add this above your table -->


                <div class="retreve_document">
                    <div class="retreve_in">
    <div class="retreve_inn" style="display:none;">                
    <div id="moveToDataRoomContainer" class="movecontainer" style="display:none;">
    <button id="moveToDataRoomBtn" class="btn btn-primary movebtn" data-bs-toggle="modal" data-bs-target="#dataRoomModal">
    Move Files to Data Room
    </button>
    </div>
    <a class="done_chcel">Reset</a>
    </div>
    </div>

<div class="retreve_inn_sec"> 
    <span>Retrieve documents quickly with Advanced Search.</span>
    <!--<a href="{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices" id="load-notices-btn">TRY OUT-->
     <a href="{{url('/user/advsearch')}}">TRY OUT
    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.666341 5L11.333 5M11.333 5L7.33301 9M11.333 5L7.33301 1" stroke="#CEFFA8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </a>
    </div>
</div>

                <div class="modal-body">
                    <h3>Notices</h3> 
                 {{-- <div class="filter-section">
    <label for="financialYearFilter">Filter by Financial Year:</label>
    <select id="financialYearFilter">
        <option value="all">All</option>
         <option value="2013-2014">2013-2014</option>
              <option value="2014-2015">2014-2015</option>
               <option value="2015-2016">2015-2016</option>
                <option value="2016-2017">2016-2017</option>
                 <option value="2017-2018">2017-2018</option>
                  <option value="2018-2019">2018-2019</option>
                   <option value="2019-2020">2019-2020</option>
                  
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
            <option value="2024-2025">2024-2025</option>
            <option value="2025-2026">2025-2026</option>
             <option value="2026-2027">2026-2027</option>

              <option value="2027-2028">2027-2028</option>
               <option value="2028-2029">2028-2029</option>
                <option value="2029-2030">2029-2030</option>
                 <option value="2030-2031">2030-2031</option>
                  <option value="2031-2032">2031-2032</option>
                   <option value="2032-2033">2032-2033</option>
                    <option value="2033-2034">2033-2034</option>
                     <option value="2034-2035">2034-2035</option>
                      <option value="2035-2036">2035-2036</option>
                       <option value="2036-2037">2036-2037</option>
    </select>
</div> --}}
 <div class="comman_loderrs" id="client_loader" style="display: none;">
      <div class="loder_wraper_inn_pos">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>

                            </div>



                    <div class="custom_table_wraap" style="display: block;">
                        <table class="table table-striped display" style="width:100%" id="filesTableboardhrempoofer">
                            <thead>
                                <tr>
                                    <th class="check_boox"></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Financial Year</th>
                                    <th>Month</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- data show table model end -->

<!-- repeat me end -->


 <!-- repeat me start -->
                             
<!-- data show table model satrt Acceptance_Letter_count-->
    <div class="modal fade drop_coman_file have_title borde_show_fulll_data" id="Acceptance_Letter_count" tabindex="-1" role="dialog" aria-labelledby="Acceptance_Letter_count" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:700">Acceptance Letter</h5>
                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="retreve_document">
                    <div class="retreve_in">
    <div class="retreve_inn" style="display:none;">                
    <div id="moveToDataRoomContainer" class="movecontainer" style="display:none;">
    <button id="moveToDataRoomBtn" class="btn btn-primary movebtn" data-bs-toggle="modal" data-bs-target="#dataRoomModal">
    Move Files to Data Room
    </button>
    </div>
    <a class="done_chcel">Reset</a>
    </div>
    </div>

<div class="retreve_inn_sec"> 
    <span>Retrieve documents quickly with Advanced Search.</span>
    <!--<a href="{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices" id="load-notices-btn">TRY OUT-->
     <a href="{{url('/user/advsearch')}}">TRY OUT
    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.666341 5L11.333 5M11.333 5L7.33301 9M11.333 5L7.33301 1" stroke="#CEFFA8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </a>
    </div>
</div>
                <div class="modal-body">
                    <h3>Minute Book</h3>
                    <div class="custom_table_wraap">
                        <table class="table table-striped display" style="width:100%" id="filesTableboardemponboardal">
                            <thead>
                                <tr>
                                    <th class="check_boox"></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Financial Year</th>
                                    <th>Month</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- data show table model end -->

<!-- repeat me end -->


<!-- repeat me start -->

<!-- data show table model satrt Employment_Agreement_count-->
    <div class="modal fade drop_coman_file have_title borde_show_fulll_data" id="Employment_Agreement_count" tabindex="-1" role="dialog" aria-labelledby="Employment_Agreement_count" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:700">Employment Agreement</h5>
                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
                 <div class="retreve_document">
                    <div class="retreve_in">
    <div class="retreve_inn" style="display:none;">                
    <div id="moveToDataRoomContainer" class="movecontainer" style="display:none;">
    <button id="moveToDataRoomBtn" class="btn btn-primary movebtn" data-bs-toggle="modal" data-bs-target="#dataRoomModal">
    Move Files to Data Room
    </button>
    </div>
    <a class="done_chcel">Reset</a>
    </div>
    </div>

<div class="retreve_inn_sec"> 
    <span>Retrieve documents quickly with Advanced Search.</span>
    <!--<a href="{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices" id="load-notices-btn">TRY OUT-->
     <a href="{{url('/user/advsearch')}}">TRY OUT
    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.666341 5L11.333 5M11.333 5L7.33301 9M11.333 5L7.33301 1" stroke="#CEFFA8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </a>
    </div>
</div>
                <div class="modal-body">
                    <h3>Attendance sheet</h3>
                    <div class="custom_table_wraap">
                        <table class="table table-striped display" style="width:100%" id="filesTableemponboardea">
                            <thead>
                                <tr>
                                    <th class="check_boox"></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Financial Year</th>
                                    <th>Month</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- data show table model end -->

<!-- repeat me end -->

<!-- repeat me start -->

<!-- data show table model satrt Non_Disclosure_Agreement_count-->
    <div class="modal fade drop_coman_file have_title borde_show_fulll_data" id="Non_Disclosure_Agreement_count" tabindex="-1" role="dialog" aria-labelledby="Non_Disclosure_Agreement_count" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:700">Non Disclosure Agreement</h5>
                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="retreve_document">
                    <div class="retreve_in">
    <div class="retreve_inn" style="display:none;">                
    <div id="moveToDataRoomContainer" class="movecontainer" style="display:none;">
    <button id="moveToDataRoomBtn" class="btn btn-primary movebtn" data-bs-toggle="modal" data-bs-target="#dataRoomModal">
    Move Files to Data Room
    </button>
    </div>
    <a class="done_chcel">Reset</a>
    </div>
    </div>

<div class="retreve_inn_sec"> 
    <span>Retrieve documents quickly with Advanced Search.</span>
    <!--<a href="{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices" id="load-notices-btn">TRY OUT-->
     <a href="{{url('/user/advsearch')}}">TRY OUT
    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.666341 5L11.333 5M11.333 5L7.33301 9M11.333 5L7.33301 1" stroke="#CEFFA8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </a>
    </div>
</div>
                <div class="modal-body">
                    <h3>Resolutions</h3>
                    <div class="custom_table_wraap">
                        <table class="table table-striped display" style="width:100%" id="filesTableemponboardnda">
                            <thead>
                                <tr>
                                    <th class="check_boox"></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Financial Year</th>
                                    <th>Month</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- data show table model end -->

<!-- repeat me end -->

<!-- repeat me start -->

<!-- data show table model satrt Non_compete_count-->
<div class="modal fade drop_coman_file have_title borde_show_fulll_data" id="Non_compete_count" tabindex="-1" role="dialog" aria-labelledby="Non_compete_count" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:700">Non-compete</h5>
                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="retreve_document">
                    <div class="retreve_in">
    <div class="retreve_inn" style="display:none;">                
    <div id="moveToDataRoomContainer" class="movecontainer" style="display:none;">
    <button id="moveToDataRoomBtn" class="btn btn-primary movebtn" data-bs-toggle="modal" data-bs-target="#dataRoomModal">
    Move Files to Data Room
    </button>
    </div>
    <a class="done_chcel">Reset</a>
    </div>
    </div>

<div class="retreve_inn_sec"> 
    <span>Retrieve documents quickly with Advanced Search.</span>
    <!--<a href="{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices" id="load-notices-btn">TRY OUT-->
     <a href="{{url('/user/advsearch')}}">TRY OUT
    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.666341 5L11.333 5M11.333 5L7.33301 9M11.333 5L7.33301 1" stroke="#CEFFA8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </a>
    </div>
</div>
                <div class="modal-body">
                    <h3>Resolutions</h3>
                    <div class="custom_table_wraap">
                        <table class="table table-striped display" style="width:100%" id="filesTableemponboardnc">
                            <thead>
                                <tr>
                                    <th class="check_boox"></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Financial Year</th>
                                    <th>Month</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- data show table model end -->

<!-- repeat me end -->

<!-- repeat me start -->

<!-- data show table model satrt Contractual_Bond_count-->
<div class="modal fade drop_coman_file have_title borde_show_fulll_data" id="Contractual_Bond_count" tabindex="-1" role="dialog" aria-labelledby="Contractual_Bond_count" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:700">Contractual Bond</h5>
                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="retreve_document">
                    <div class="retreve_in">
    <div class="retreve_inn" style="display:none;">                
    <div id="moveToDataRoomContainer" class="movecontainer" style="display:none;">
    <button id="moveToDataRoomBtn" class="btn btn-primary movebtn" data-bs-toggle="modal" data-bs-target="#dataRoomModal">
    Move Files to Data Room
    </button>
    </div>
    <a class="done_chcel">Reset</a>
    </div>
    </div>

<div class="retreve_inn_sec"> 
    <span>Retrieve documents quickly with Advanced Search.</span>
    <!--<a href="{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices" id="load-notices-btn">TRY OUT-->
     <a href="{{url('/user/advsearch')}}">TRY OUT
    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.666341 5L11.333 5M11.333 5L7.33301 9M11.333 5L7.33301 1" stroke="#CEFFA8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </a>
    </div>
</div>
                <div class="modal-body">
                    <h3>Resolutions</h3>
                    <div class="custom_table_wraap">
                        <table class="table table-striped display" style="width:100%" id="filesTableemponboardcb">
                            <thead>
                                <tr>
                                    <th class="check_boox"></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Financial Year</th>
                                    <th>Month</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- data show table model end -->

<!-- repeat me end -->

<!-- repeat me start -->

<!-- data show table model satrt Form_11_EPF_count-->
<div class="modal fade drop_coman_file have_title borde_show_fulll_data" id="Form_11_EPF_count" tabindex="-1" role="dialog" aria-labelledby="Form_11_EPF_count" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:700">Form 11 - EPF</h5>
                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="retreve_document">
                    <div class="retreve_in">
    <div class="retreve_inn" style="display:none;">                
    <div id="moveToDataRoomContainer" class="movecontainer" style="display:none;">
    <button id="moveToDataRoomBtn" class="btn btn-primary movebtn" data-bs-toggle="modal" data-bs-target="#dataRoomModal">
    Move Files to Data Room
    </button>
    </div>
    <a class="done_chcel">Reset</a>
    </div>
    </div>

<div class="retreve_inn_sec"> 
    <span>Retrieve documents quickly with Advanced Search.</span>
    <!--<a href="{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices" id="load-notices-btn">TRY OUT-->
     <a href="{{url('/user/advsearch')}}">TRY OUT
    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.666341 5L11.333 5M11.333 5L7.33301 9M11.333 5L7.33301 1" stroke="#CEFFA8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </a>
    </div>
</div>
                <div class="modal-body">
                    <h3>Resolutions</h3>
                    <div class="custom_table_wraap">
                        <table class="table table-striped display" style="width:100%" id="filesTableemponboardepf">
                            <thead>
                                <tr>
                                    <th class="check_boox"></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Financial Year</th>
                                    <th>Month</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- data show table model end -->

<!-- repeat me end -->

<!-- repeat me start -->

<!-- data show table model satrt Form_12BB_Income_Tax_count-->
<div class="modal fade drop_coman_file have_title borde_show_fulll_data" id="Form_12BB_Income_Tax_count" tabindex="-1" role="dialog" aria-labelledby="Form_12BB_Income_Tax_count" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:700">Form 12BB - Income Tax</h5>
                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                        <span aria-hidden="true">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="retreve_document">
                    <div class="retreve_in">
    <div class="retreve_inn" style="display:none;">                
    <div id="moveToDataRoomContainer" class="movecontainer" style="display:none;">
    <button id="moveToDataRoomBtn" class="btn btn-primary movebtn" data-bs-toggle="modal" data-bs-target="#dataRoomModal">
    Move Files to Data Room
    </button>
    </div>
    <a class="done_chcel">Reset</a>
    </div>
    </div>

<div class="retreve_inn_sec"> 
    <span>Retrieve documents quickly with Advanced Search.</span>
    <!--<a href="{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices" id="load-notices-btn">TRY OUT-->
     <a href="{{url('/user/advsearch')}}">TRY OUT
    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.666341 5L11.333 5M11.333 5L7.33301 9M11.333 5L7.33301 1" stroke="#CEFFA8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    </a>
    </div>
</div>
                <div class="modal-body">
                    <h3>Resolutions</h3>
                    <div class="custom_table_wraap">
                        <table class="table table-striped display" style="width:100%" id="filesTableemponboardincometax">
                            <thead>
                                <tr>
                                    <th class="check_boox"></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Financial Year</th>
                                    <th>Month</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- data show table model end -->

<!-- repeat me end -->


        `;
        $('.file-container').append(tableHtml);
    }

    function insertcharterdocumentsRegistrationsTableAppendedTable() {
        const tableHtml = `
            @include('Charter_documents_Registrations')
        `;
        $('.file-container').append(tableHtml);
    }
    
    
     function insertcharterdocumentsIncorporationTableAppendedTable() {
        const tableHtml = `
            @include('Charter_documents_Incorporation')
        `;
        $('.file-container').append(tableHtml);
    }
    
    function insertcharterdocumentsDirectordetatilsDirector2Table() {
        const tableHtml = `
            @include('Charter_documents_Director_Details_Director_2')
        `;
        $('.file-container').append(tableHtml);
    }
    
     function insertcharterdocumentsDirectordetatilsDirector1Table() {
        const tableHtml = `
            @include('Charter_documents_Director_Details_Director_1')
        `;
        $('.file-container').append(tableHtml);
    }
    
    function insertbankMutualFundStatementsTable() {
        const tableHtml = `
            @include('Book-Keeping_Mutual_Fund_Statements')
        `;
        $('.file-container').append(tableHtml);
    }
    
     function insertbankCreditCardStatementsTable() {
        const tableHtml = `
            @include('Book-Keeping_Credit_Card_Statements')
        `;
        $('.file-container').append(tableHtml);
    }
    
    function insertbankFixedDepositStatementsTable() {
        const tableHtml = `
            @include('Book-Keeping_Fixed_Deposit_Statements')
        `;
        $('.file-container').append(tableHtml);
    }
    
    function insertbankAccountStatementsTable() {
        const tableHtml = `
            @include('Book-Keeping_Bank_Account_Statements')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertundertakingTable() {
        const tableHtml = `
            @include('Secretarial_Deposit_Undertakings')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertstaturegiTable() {
        const tableHtml = `
            @include('Secretarial_Statutory_Registers')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertauditexitTable() {
        const tableHtml = `
            @include('Secretarial_Auditor_Exits')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertauditappTable() {
        const tableHtml = `
            @include('Secretarial_Auditor_Appointment')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertDirectexitTable() {
        const tableHtml = `
            @include('Secretarial_Director_Exits')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertDirectTable() {
        const tableHtml = `
            @include('Secretarial_Director_Appointments')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertANNTable() {
        const tableHtml = `
            @include('Secretarial_Annual_Filings')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertINCTable() {
        const tableHtml = `
            @include('Secretarial_Incorporation')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertOrderTable() {
        const tableHtml = `
            @include('Secretarial_Extra_Ordinary_General_Meeting')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertMeetingTable() {
        const tableHtml = `
            @include('Secretarial_Annual_General_Meeting')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertIncorporationTable() {
        const tableHtml = `
            @include('Secretarial_Board_Meetings')
        `;
        $('.file-container').append(tableHtml);
    }

    $('.hidebdnotice').on('click', function() {
        alert('hello');
        console.log("clicked");
    });

    $('#create-folder-form').on('submit', function(e) {
        e.preventDefault();
        var $submitButton = $(this).find('button[type="submit"]');
        $submitButton.prop('disabled', true).append('<span class="button-spinner"></span>');
        var formData = $(this).serialize();
        
        var parentFolderValue = $('#parent-folder').val();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                setTimeout(function() {
                    $('.button-spinner').remove();
                    toastr.success(response.message);
                   
                        window.location.reload(true);
                        exit;
                    if (response.success) {
                        $('#create_folder').modal('hide');
                        fetchFolderContents(parentFolderValue);
                        $('#create_folderr').modal('hide');
                        if (!parentFolderValue) {
                            $("#fresponsive").load(" #fresponsive > *");
                        } else {
                            fetchSubfolders(parentFolderValue, function(latestFolderPath) {
                                // Additional actions if needed after fetching subfolders
                            });
                        }
                        $('.ba-we-love-subscribers').removeClass("open");
                        $('.ba-we-love-subscribers-fab').removeClass("gray");
                        $('.img-fab.img').removeClass("close");
                    }
                    $('input[name="folder_name"]').val('');
                    $submitButton.prop('disabled', false);
                }, 5000); // Show loader for 5 seconds
            },
            error: function(xhr) {
                $('.button-spinner').remove();
                let response = JSON.parse(xhr.responseText);
                toastr.error('Error: ' + response.message);
                $('input[name="folder_name"]').val('');
                $submitButton.prop('disabled', false);
                $('.ba-we-love-subscribers').removeClass("open");
                $('.ba-we-love-subscribers-fab').removeClass("gray");
                $('.img-fab.img').removeClass("close");
            }
        });
    });

 $('#upload-file-form').on('submit', function(e) {
    e.preventDefault();
    var $submitButton = $(this).find('button[type="submit"]');
    $submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable and append spinner

    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $('.button-spinner').remove(); // Remove spinner

            if (response.success) {
                // toastr.success('File uploaded successfully!'); // Display success toaster message
                if (response.successMessages.length) {
                    response.successMessages.forEach(function(msg) {
                        toastr.success(msg);
                    });
                }
                if (response.errorMessages.length) {
                    response.errorMessages.forEach(function(msg) {
                        toastr.warning(msg);
                    });
                }
                $('#upload_file').modal('hide');
                $('#upload_filee').modal('hide');
                fetchFolderContents($('#parent-folder').val());
                resetFileInput($('input[name="file"]'));
                window.location.reload(true);
                exit;
            } else {
                toastr.error('Failed to upload file: ' + response.message);
                
            }
            
            $submitButton.prop('disabled', false); // Re-enable submit button
        },
        error: function(xhr) {
            $('.button-spinner').remove(); // Remove spinner
            $submitButton.prop('disabled', false); // Re-enable submit button

            if (xhr.status === 400 || xhr.status === 500) {
                let response = JSON.parse(xhr.responseText);
                toastr.error('Error: ' + response.message);
                
            } else {
                toastr.error('An unknown error occurred.');
               
            }
        }
    });
});


    function resetFileInput($fileInput) {
        $fileInput.val('');
        var fileArea = $fileInput.closest('.modal-content');
        var selectedFileDiv = fileArea.find('.selected-file');
        selectedFileDiv.text('');

        fileArea.removeClass('green-outline');
        fileArea.css('outline', '2px dashed #D2DBE5');
        $fileInput.closest('.file-dummy').find('.fille').css('display', 'inline');
    }

    function fetchFirstParentFolderContents() {
        var firstParentPath = $('.folder-link:first').data('folder-path');
        if (firstParentPath) {
            fetchFolderContents(firstParentPath);
        } else {
            $('.folder-contents').html('No folders available.');
            $('.file-contents').html('No files available.');
        }
    }

    fetchFirstParentFolderContents();
    bindFolderClickEvents();

    var firstFolderPath = '{{ $folders->where("parent_name", null)->first()->path ?? '' }}';
    const encodedString = getQueryParamf('folder');
    const decodedString = decodeURIComponent(encodedString);
    
    $('#parent-folder').val(folder );
    $('#parent-folders').val(firstFolderPath);

    toggleLabelWrap();
});

// Simulating document loading
$(window).on('load', function() {
    // After everything is loaded, hide the loader
    hideLoader();
});

</script>