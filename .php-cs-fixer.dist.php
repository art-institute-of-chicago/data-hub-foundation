<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude([
        '.git',
        'bootstrap/cache',
        'node_modules',
        'public',
        'resources/lang',
        'storage',
        'vendor',
    ])
    ->in(getcwd());

$config = new PhpCsFixer\Config();
$config->setFinder($finder);
$config->setRules([
    '@PSR1' => true,

    'align_multiline_comment' => [          // Each line of multi-line DocComments must have an asterisk [PSR-5] and must be aligned with the first one.
        'comment_type' => 'phpdocs_like',
    ],
    'array_indentation' => true,            // Each element of an array must be indented exactly once.
    'array_syntax' => true,                 // PHP arrays should be declared using the configured syntax.
    'backtick_to_shell_exec' => true,       // Converts backtick operators to shell_exec calls.
    'binary_operator_spaces' => true,       // Binary operators should be surrounded by space as configured.
    'blank_line_after_namespace' => true,   // There MUST be one blank line after the namespace declaration.
    'blank_line_after_opening_tag' => true, // Ensure there is no code on the same line as the PHP open tag and it is followed by a blank line.
    'blank_line_before_statement' => [      // An empty line feed must precede any configured statement.
        'statements' => [
            'for',
            'foreach',
            'if',
            'switch',
            'try',
            'while',
        ],
    ],
    'cast_spaces' => true,                  // A single space should be between cast and variable.
    'class_definition' => [                 // Whitespace around the keywords of a class, trait or interfaces definition should be one space.
        'multi_line_extends_each_single_line' => true,
        'single_item_single_line' => true,
    ],
    'compact_nullable_typehint' => true,    // Remove extra spaces in a nullable typehint.
    'concat_space' => [                     // Concatenation should be spaced according configuration.
        'spacing' => 'one',
    ],
    'declare_equal_normalize' => [          // Equal sign in declare statement should be surrounded by spaces or not following configuration.
        'space' => 'single',
    ],
    'elseif' => true,                       // The keyword elseif should be used instead of else if so that all control keywords look like single words.
    'encoding' => true,                     // PHP code MUST use only UTF-8 without BOM (remove BOM).
    'explicit_indirect_variable' => true,   // Add curly braces to indirect variables to make them clear to understand. Requires PHP >= 7.0.=
    'explicit_string_variable' => true,     // Converts implicit variables into explicit ones in double-quoted strings or heredoc syntax.
    'full_opening_tag' => true,             // PHP code must use the long <?php tags or short-echo <?= tags and not other tag variations.
    'fully_qualified_strict_types' => true, // Transforms imported FQCN parameters and return types in function arguments to short version.
    'function_declaration' => true,         // Spaces should be properly placed in a function declaration.
    'function_typehint_space' => true,      // Ensure single space between function's argument and its typehint.
    'include' => true,                      // Include/Require and file path should be divided with a single space. File path should not be placed under brackets.
    'increment_style' => true,              // Pre- or post-increment and decrement operators should be used if possible.
    'indentation_type' => true,             // Code MUST use configured indentation type.
    'line_ending' => true,                  // All PHP files must use same line ending.
    'linebreak_after_opening_tag' => true,  // Ensure there is no code on the same line as the PHP open tag.
    'list_syntax' => true,                  // List (array destructuring) assignment should be declared using the configured syntax. Requires PHP >= 7.1.
    'lowercase_cast' => true,               // Cast should be written in lower case.
    'lowercase_keywords' => true,           // PHP keywords MUST be in lower case.
    'lowercase_static_reference' => true,   // Class static references self, static and parent MUST be in lower case.
    'magic_constant_casing' => true,        // Magic constants should be referred to using the correct casing.
    'magic_method_casing' => true,          // Magic method definitions and calls must be using the correct casing.
    'method_argument_space' => true,        // In method arguments and method call, there MUST NOT be a space before each comma and there MUST be one space after each comma. Argument lists MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.
    'method_chaining_indentation' => true,  // Method chaining MUST be properly indented. Method chaining with different levels of indentation is not supported.
    'multiline_comment_opening_closing' => true, // DocBlocks must start with two asterisks, multiline comments must start with a single asterisk, after the opening slash. Both must end with a single asterisk before the closing slash.
    'multiline_whitespace_before_semicolons' => true, // Forbid multi-line whitespace before the closing semicolon or move the semicolon to the new line for chained calls.
    'native_function_casing' => true,       // Function defined by PHP should be called using the correct casing.
    'native_function_type_declaration_casing' => true, // Native type hints for functions should use the correct case.
    'new_with_braces' => true,              // All instances created with new keyword must be followed by braces.
    'no_alternative_syntax' => true,        // Replace control structure alternative syntax to use braces.]
    'no_binary_string' => true,             // There should not be a binary flag before strings.
    'no_break_comment' => true,             // There must be a comment when fall-through is intentional in a non-empty case body.
    'no_closing_tag' => true,               // The closing \?\> tag MUST be omitted from files containing only PHP.
    'no_empty_comment' => true,             // There should not be any empty comments.
    'no_empty_phpdoc' => true,              // There should not be empty PHPDoc blocks.
    'no_empty_statement' => true,           // Remove useless (semicolon) statements.
    'no_extra_blank_lines' => true,         // Removes extra blank lines and/or blank lines following configuration.
    'no_leading_import_slash' => true,      // Remove leading slashes in use clauses.
    'no_leading_namespace_whitespace' => true, // The namespace declaration line shouldn't contain leading whitespace.
    'no_mixed_echo_print' => true,          // Either language construct print or echo should be used.
    'no_multiline_whitespace_around_double_arrow' => true, // Operator => should not be surrounded by multi-line whitespaces.
    'no_null_property_initialization' => true, // Properties MUST not be explicitly initialized with null except when they have a type declaration (PHP 7.4).
    'no_short_bool_cast' => true,           // Short cast bool using double exclamation mark should not be used.
    'no_singleline_whitespace_before_semicolons' => true, // Single-line whitespace before closing semicolon are prohibited.
    'no_spaces_after_function_name' => true, // When making a method or function call, there MUST NOT be a space between the method or function name and the opening parenthesis.
    'no_spaces_around_offset' => true,      // There MUST NOT be spaces around offset braces.
    'no_spaces_inside_parenthesis' => true, // There MUST NOT be a space after the opening parenthesis. There MUST NOT be a space before the closing parenthesis.
    'no_superfluous_elseif' => true,        // Replaces superfluous elseif with if.
    'no_superfluous_phpdoc_tags' => [       // Removes @param, @return and @var tags that don't provide any useful information.
        'allow_mixed' => true,
    ],
    'no_trailing_comma_in_list_call' => true, // Remove trailing commas in list function calls.
    'no_trailing_comma_in_singleline_array' => true, // PHP single-line arrays should not have trailing comma.
    'no_trailing_whitespace' => true,       // Remove trailing whitespace at the end of non-blank lines.
    'no_trailing_whitespace_in_comment' => true, // There MUST be no trailing spaces inside comment or PHPDoc.
    'no_unneeded_curly_braces' => true,     // Removes unneeded curly braces that are superfluous and aren't part of a control structure's body.
    'no_unset_cast' => true,                // Variables must be set null instead of using (unset) casting.
    'no_unused_imports' => true,            // Unused use statements must be removed.
    'no_useless_else' => true,              // There should not be useless else cases.
    'no_useless_return' => true,            // There should not be an empty return statement at the end of a function.
    'no_whitespace_in_blank_line' => true,  // Remove trailing whitespace at the end of blank lines.
    'normalize_index_brace' => true,        // Array index should always be written by using square braces.
    'object_operator_without_whitespace' => true, // There should not be space before or after object operators -> and ?->.
    'return_type_declaration' => true,      // There should be one or no space before colon, and one space after it in return type declarations, according to configuration.
    'semicolon_after_instruction' => true,  // Instructions must be terminated with a semicolon.
    'short_scalar_cast' => true,            // Cast (boolean) and (integer) should be written as (bool) and (int), (double) and (real) as (float), (binary) as (string).
    'single_blank_line_at_eof' => true,     // A PHP file without end tag must always end with a single empty line feed.
    'single_blank_line_before_namespace' => true, // There should be exactly one blank line before a namespace declaration.
    'single_import_per_statement' => true,  // There MUST be one use keyword per declaration.
    'single_line_after_imports' => true,    // Each namespace use MUST go on its own line and there MUST be one blank line after the use statements block.
    'single_line_comment_style' => true,    // Single-line comments and multi-line comments with only one line of actual content should use the // syntax.
    'single_quote' => true,                 // Convert double quotes to single quotes for simple strings.
    'standardize_not_equals' => true,       // Replace all <> with !=.
    'switch_case_semicolon_to_colon' => true, // A case should be followed by a colon and not a semicolon.
    'switch_case_space' => true,            // Removes extra spaces between colon and case value.
    'ternary_operator_spaces' => true,      // Standardize spaces around ternary operator.
    'ternary_to_null_coalescing' => true,   // Use null coalescing operator ?? where possible. Requires PHP >= 7.0.
    'trim_array_spaces' => true,            // Arrays should be formatted like function/method arguments, without leading or trailing single line space.
    'unary_operator_spaces' => true,        // Unary operators should be placed adjacent to their operands.
    'whitespace_after_comma_in_array' => true, // In array declaration, there MUST be a whitespace after each comma.
]);

return $config;
