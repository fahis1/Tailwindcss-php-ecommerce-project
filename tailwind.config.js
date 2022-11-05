module.exports = {

  content: ['./*.html', './*.php', './admin/*.html', './admin/*.php', './include/*.html', './include/*.php',],
  plugins: [require("daisyui")],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'sun': { DEFAULT: '#FCA311', '50': '#FEE9C6', '100': '#FEE1B2', '200': '#FED28A', '300': '#FDC262', '400': '#FDB339', '500': '#FCA311', '600': '#D28403', '700': '#9B6102', '800': '#633E01', '900': '#2C1C01' },
      'dblue': { DEFAULT: '#14213D', '50': '#466EC2', '100': '#3C63B8', '200': '#325399', '300': '#28427A', '400': '#1E325C', '500': '#14213D', '600': '#060A13', '700': '#000000', '800': '#000000', '900': '#000000' },
      'mercury': { DEFAULT: '#E5E5E5', '50': '#FFFFFF', '100': '#FFFFFF', '200': '#FFFFFF', '300': '#FFFFFF', '400': '#F9F9F9', '500': '#E5E5E5', '600': '#C9C9C9', '700': '#ADADAD', '800': '#919191', '900': '#757575' },
      'porcelain': { DEFAULT: '#ECEEF0', '50': '#FFFFFF', '100': '#FFFFFF', '200': '#FFFFFF', '300': '#FFFFFF', '400': '#FFFFFF', '500': '#ECEEF0', '600': '#CDD2D7', '700': '#ADB6BE', '800': '#8E9AA6', '900': '#6F7E8D' },

    },
  },
  daisyui: {
    styled: true,
    themes: ["cupcake", "light"],
  },
}
