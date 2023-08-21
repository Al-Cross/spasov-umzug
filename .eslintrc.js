module.exports = {
  extends: [
    'plugin:vue/vue3-recommended',
    'plugin:vue/vue3-strongly-recommended',
  ],
  rules: {
    "vue/multi-word-component-names": 0,
    "vue/first-attribute-linebreak": ["error", {
      "singleline": "ignore",
      "multiline": "ignore"
    }],
    "vue/max-attributes-per-line": ["error", {
      "singleline": {
        "max": 5
      },
      "multiline": {
        "max": 4
      }
    }],
    "vue/html-closing-bracket-newline": ["error", {
      "multiline": "never"
    }],
    "vue/singleline-html-element-content-newline": "off",
    "vue/multiline-html-element-content-newline": "off",
    "vue/html-self-closing": ["error", {
      "html": {
        "void": "always",
        "normal": "any",
        "component": "always"
      }
    }],
    "vue/html-indent": ["error", "tab"],
    "vue/require-default-prop": "off"
  }
}